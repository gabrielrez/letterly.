<x-layout>
    <x-app_components.header></x-app_components.header>

    <main class="mt-12 flex gap-24">
        <x-app_components.sidebar></x-app_components.sidebar>
        <div class="w-full">
            <x-app_components.search-menu></x-app_components.search-menu>
            @foreach ($posts as $post)
                <div>
                    <div class="flex justify-between items-center">
                        <a href="/home" class="flex items-center gap-3 text-primary hover:underline">
                            <img src="img/profile-picture-default.jpg" class="w-10 h-10 border-2 border-primary rounded-full object-cover">
                            <span class="font-bold">{{ $post->user->username }}</span>
                        </a>
                        <span class="text-black text-sm font-extralight italic">{{ $post->created_at->format('d/m/Y') }}</span>
                    </div>
                    <h3 class="text-4xl font-semibold mt-2">{{ $post['title'] }}</h3>
                    <p class="font-medium italic mt-2">{{ $post['subtitle'] }}</p>
                    <p class="mt-6 font-normal" id="post_content">{{ Str::limit($post['content'], 400, '...') }}</p>
                    <div class="mt-6 flex justify-between items-center">
                        <a href="/home" class="underline font-semibold hover:text-primary">Read all</a>
                        <div class="flex items-center gap-10 italic">
                            <a href="/home" class="hover:underline">Save</a>
                            <a href="/home" class="hover:underline">Comments</a>
                        </div>
                    </div>
                </div>

                <span class="block mx-auto w-32 h-[2px] border-b border-dashed border-detail my-16"></span>                
            @endforeach
        </div>
    </main>

</x-layout>

@vite('resources/js/scripts/explore.js');