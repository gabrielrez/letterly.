<x-layout>
    <x-app_components.header></x-app_components.header>

    <main class="mt-12 flex gap-24">
        <x-app_components.sidebar></x-app_components.sidebar>
        <div class="w-full">
            <div class="w-full flex items-center gap-6">
                <img src="/img/profile-picture-default.jpg" class="w-max max-w-32 max-h-32 border-2 border-primary rounded-full object-cover">
                <div class="w-full">
                    <h3 class="text-2xl font-semibold">{{ $user->name }}</h3>
                    <p class="text-gray font-semibold">{{ $user->username }}</p>
                    <p class="mt-2 text-sm">{{ $user->bio  }}</p>
                </div>
            </div>
            <div class="flex gap-6 mt-12">
                <div class="bg-primary px-7 py-2 rounded-[4px]">
                    <p class="font-semibold text-white">{{ $user->followers()->count() }} followers</p>
                </div>
                <div id="follow-container">
                    @if(Auth::user()->isFollowing($user))
                        <button id="follow-btn" data-id="{{ $user->id }}" class="bg-primary px-7 py-2 border-2 border-primary rounded-[4px] text-white font-semibold">
                            Following <i class="fa-solid fa-check ml-1"></i>
                        </button>
                    @else
                        <button id="follow-btn" data-id="{{ $user->id }}" class="text-primary hover:text-white border-2 border-primary hover:bg-primary px-7 py-2 rounded-[4px] transition duration-200 ease-in-out">
                            Follow <i class="fa-solid fa-user-plus ml-1"></i>
                        </button>
                    @endif
                </div>                
                <div class="border-2 border-black px-7 py-1.5 rounded-[4px]">
                    @if($writings->count() < 10 && $writings->count() != 0)
                    <p class="font-semibold text-black">0{{ $writings->count() }} writings</p>
                    @else
                    <p class="font-semibold text-black">{{ $writings->count() }} writings</p>
                    @endif
                </div>
            </div>
            <span class="block mx-auto w-full h-[2px] border-b border-dashed border-detail my-12"></span>
            <div>
                @foreach ($writings as $writing)
                    <div class="pl-6 border-l rounded-[4px] border-dashed border-black mb-12">
                        <div class="flex justify-between items-baseline gap-3">
                            <h3 class="text-2xl font-semibold">{{ $writing->title }}</h3>
                            <span class="text-black text-sm font-extralight italic">{{ $writing->created_at->format('d/m/Y') }}</span>
                        </div>
                        <p class="mt-2 mb-3 italic">{{ $writing->subtitle }}</p>
                        <a href="/writings/{{ $writing->id }}" class="underline text-primary">Read</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

</x-layout>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const followBtn = document.getElementById("follow-btn");

        if (followBtn) {
            followBtn.addEventListener("click", async function () {
                const userId = this.getAttribute("data-id");
                const isFollowing = this.classList.contains("bg-primary");

                const url = isFollowing ? `/unfollow/${userId}` : `/follow/${userId}`;
                const method = isFollowing ? "DELETE" : "POST";

                followBtn.disabled = true;

                try {
                    const response = await fetch(url, {
                        method: method,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        }
                    });

                    if (!response.ok) {
                        throw new Error("Failed to perform the action. Please try again.");
                    }

                    const data = await response.json();
                    if (data.success) {
                        if (isFollowing) {
                            followBtn.innerHTML = `Follow <i class="fa-solid fa-user-plus ml-1"></i>`;
                            followBtn.classList.remove("bg-primary", "text-white");
                            followBtn.classList.add("text-primary", "hover:text-white", "border-2", "border-primary", "hover:bg-primary");
                        } else {
                            followBtn.innerHTML = `Following <i class="fa-solid fa-check ml-1"></i>`;
                            followBtn.classList.remove("text-primary", "hover:text-white", "hover:bg-primary");
                            followBtn.classList.add("bg-primary", "text-white");
                        }
                    } else {
                        alert("Something went wrong. Please try again.");
                    }
                } catch (error) {
                    console.error("Error on following/unfollowing:", error);
                    alert("Something went wrong. Please try again later.");
                } finally {
                    followBtn.disabled = false;
                }
            });
        }
    });
</script> 