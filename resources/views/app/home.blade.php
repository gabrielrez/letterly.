<x-layout>
    <x-app_components.header></x-app_components.header>

    <main class="mt-12 flex gap-24">
        <x-app_components.sidebar></x-app_components.sidebar>
        <div class="w-full">
            <x-app_components.search-menu></x-app_components.search-menu>
            @foreach ($writings as $writing)
                <div>
                    <div class="flex justify-between items-center">
                        <a href="/profile/{{ $writing->user_id }}" class="flex items-center gap-3 text-primary hover:underline">
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
        </div>
    </main>

</x-layout>

@vite('resources/js/scripts/home/explore.js')
@vite('resources/js/scripts/home/saves.js')