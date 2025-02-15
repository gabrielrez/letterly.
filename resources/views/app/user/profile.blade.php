<x-layout>
    <x-app_components.header></x-app_components.header>

    <main class="mt-12 flex gap-24">
        <x-app_components.sidebar></x-app_components.sidebar>
        <div class="w-full">
            <div class="w-full flex items-center gap-6">
                <img src="/img/profile-picture-default.jpg" class="w-max max-w-32 max-h-32 border-2 border-primary rounded-full object-cover">
                <div class="w-full">
                    <div class="w-full flex justify-between">
                        <h3 class="text-2xl font-semibold">{{ Auth::user()->name }}</h3>
                        <a href="/profile/edit" class="text-sm hover:underline italic"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                    </div>
                    <p class="text-gray font-semibold">{{ Auth::user()->username }}</p>
                    <p class="mt-2 text-sm">{{ Auth::user()->bio  }}</p>
                </div>
            </div>
            <div class="flex gap-6 mt-12">
                <div class="bg-primary px-7 py-2 rounded-[4px]">
                    <p class="font-semibold text-white">126 followers</p>
                </div>
                <div class="border-2 border-black px-7 py-1.5 rounded-[4px]">
                    @if($writings->count() < 10 && $writings->count() != 0)
                    <p class="font-semibold text-black">0{{ $writings->count() }} writings</p>
                    @else
                    <p class="font-semibold text-black">{{ $writings->count() }} writings</p>
                    @endif
                </div>
                <a href="/saves" class="px-7 pl-0 py-2 rounded-[4px]">
                    <p class="font-semibold text-black hover:underline"><i class="fa-regular fa-bookmark mr-2"></i>Saves</p>
                </a>
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