<x-layout>
    <x-app_components.header></x-app_components.header>
        <section class="max-w-xl mx-auto myt-5 pt-3">
            <div class="flex gap-3 items-baseline">
                <a href="/home" class="text-gray w-[20ch] text-sm hover:underline"><- Return to home</a>
                <span class="block mx-auto w-full h-[2px] border-b border-dashed border-detail mb-12"></span>
            </div>
            <div class="flex justify-center mb-8">
                    <h3 class="text-2xl text-primary">Your saves <i class="fa-regular fa-bookmark ml-3"></i></h3>
            </div>
            @foreach ($writings as $writing)
                <div>
                    <div class="flex justify-between items-center">
                        <a href="/profile" class="flex items-center gap-3 text-primary hover:underline">
                            <img src="img/profile-picture-default.jpg" class="w-10 h-10 border-2 border-primary rounded-full object-cover">
                            <span class="font-bold">{{ $writing->user->username }}</span>
                        </a>
                        <span class="text-black text-sm font-extralight italic">{{ $writing->created_at->format('d/m/Y') }}</span>
                    </div>
                    <h3 class="text-4xl font-semibold mt-2">{{ $writing['title'] }}</h3>
                    <p class="font-medium italic mt-2">{{ $writing['subtitle'] }}</p>
                    <p class="mt-6 font-normal" id="writing_content">{!! Str::limit($writing['content'], 360, '...') !!}</p>
                    <div class="mt-6 flex justify-between items-center">
                        <form action="/writings/{{ $writing->id }}">
                            @csrf
                            <button class="underline font-semibold hover:text-primary">Read all</button>
                        </form>
                        <div class="flex items-center gap-10 italic">
                            <a 
                                href="/home"
                                data-id="{{ $writing['id'] }}" 
                                class="writing_save {{ $writing->isSave() ? 'text-primary' : 'text-black'}} hover:underline">
                                <i class="{{ $writing->isSave() ? 'fa-solid' : 'fa-regular'}} fa-bookmark"></i> 
                                Save
                            </a>
                            <a 
                                href="/home"
                                class="hover:underline">
                                <i class="fa-regular fa-message"></i> 
                                Comments
                            </a>
                        </div>
                    </div>
                </div>

                <span class="block mx-auto w-32 h-[2px] border-b border-dashed border-detail my-16"></span>
            @endforeach
        </section>
    <x-layout_components.footer></x-layout_components.footer>
</x-layout>

<script>
    const posts_save_btn = document.querySelectorAll('.writing_save');

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    posts_save_btn.forEach(post => {
        post.addEventListener('click', async function (event) {
            event.preventDefault();

            const writing_id = post.dataset.id;
            const icon = post.querySelector('i');

            try {
                const response = await fetch(`/writings/${writing_id}/toggle-save`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                });

                const data = await response.json();

                if (data.success) {
                    post.classList.toggle('text-primary', data.saved);

                    if (data.saved) {
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid');
                    } else {
                        icon.classList.remove('fa-solid');
                        icon.classList.add('fa-regular');
                    }
                }
            } catch (error) {
                console.error('Error on saving/unsaving writing:', error);
            }
        });
    });
</script>