<x-layout>
    <div class="flex flex-col justify-between h-screen">
        <header class="mt-5 flex justify-between">
            <img src="img/letterly..svg" alt="Letterly logo">
            <div class="flex items-center gap-6 text-sm font-semibold">
                <a href="/register" class="bg-primary hover:bg-[#750000] px-7 py-2 rounded-[4px] text-white">Get Started</a>
                <a href="/login" class="underline hover:text-primary py-2.5">Login</a>
            </div>
        </header>
        <main class="text-center">
            <h1 class="text-4xl">Empower Your Voice with Stunning <span class="text-primary underline">Writings</span></h1>
            <p class="text-base mt-6">Create, Engage and Connect Effortlessly. <a href="/register" class="text-primary underline">Start right now</a></p>
            <span class="block mx-auto w-32 h-[2px] border-b border-dashed border-primary mt-12"></span>
            <img class="mt-12" src="img/lp.webp" alt="Black and white illustration of elderly scholars reading.">
        </main>
        <x-layout_components.footer></x-layout_components.footer>
    </div>
</x-layout>