<x-layout>
    <x-app_components.header></x-app_components.header>
        <section class="max-w-xl mx-auto myt-5 pt-3">
            
            <div class="flex gap-3 items-baseline">
                <a href="/home" class="text-gray w-[36ch] text-sm hover:underline"><- Return to previous screen</a>
                <span class="block mx-auto w-full h-[2px] border-b border-dashed border-detail mb-12"></span>
            </div>

            <div class="flex justify-between items-center">
                <a href="/home" class="flex items-center gap-3 text-primary hover:underline">
                    <img src="../img/profile-picture-default.jpg" class="w-10 h-10 border-2 border-primary rounded-full object-cover">
                    <span class="font-bold">{{ $writing->user->username }}</span>
                </a>
                <span class="text-black text-sm font-extralight italic">{{ $writing->created_at->format('d/m/Y') }}</span>
            </div>
            <h3 class="text-4xl font-semibold mt-2">{{ $writing['title'] }}</h3>
            <p class="font-medium italic mt-2">{{ $writing['subtitle'] }}</p>
            <p class="mt-6 font-normal" id="writing_content">{!! $writing['content'] !!}</p>
            <div class="flex justify-end items-center gap-10 italic mt-10">
                <a href="/home" class="hover:underline">Save</a>
                <a href="/home" class="hover:underline">Comments</a>
            </div>
        </section>
    <x-layout_components.footer></x-layout_components.footer>
</x-layout>