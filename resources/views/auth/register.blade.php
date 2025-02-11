<x-layout>
    <div class="flex flex-col justify-between h-screen">
        <x-layout_components.header>
        </x-layout_components.header>

        <main class="mx-auto">
            <h1 class="text-4xl text-center">Create Account<span class="text-primary">.</span></h1>
            <form class="mt-12 w-[420px]">
                <div class="mt-6 w-full flex gap-6">
                    <div class="w-full">
                        <label for="email">First Name</label>
                        <input type="text" name="email" placeholder="Dominique" class="border border-primary    w-full rounded-[4px] mt-2 px-4 py-2" required>
                    </div>
                    <div class="w-full">
                        <label for="email">Last Name</label>
                        <input type="text" name="email" placeholder="Decocco" class="border border-primary    w-full rounded-[4px] mt-2 px-4 py-2" required>
                    </div>
                </div>
                <div class="mt-6 w-full">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="dominic@email.com" class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2" required>
                </div>
                <div class="mt-6 w-full flex gap-6">
                    <div class="w-full">
                        <label for="email">Password</label>
                        <input type="text" name="email" placeholder="********" class="border border-primary    w-full rounded-[4px] mt-2 px-4 py-2" required>
                    </div>
                    <div class="w-full">
                        <label for="email">Confirm Password</label>
                        <input type="text" name="email" placeholder="********" class="border border-primary    w-full rounded-[4px] mt-2 px-4 py-2" required>
                    </div>
                </div>
            </form>
            <button class="w-full bg-primary hover:bg-[#750000] text-white px-6 py-2 rounded-[4px] mt-10">Create Account</button>
            <p class="text-black text-center mt-5">Already have an account? <a href="/login" class="underline text-primary">Login</a></p>
        </main>

        <x-layout_components.footer>
        </x-layout_components.footer>
    </div>
</x-layout>