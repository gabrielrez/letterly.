<x-layout>
    <div class="flex flex-col justify-between h-screen">
        <x-layout_components.header></x-layout_components.header>

        <main class="mx-auto">
            <h1 class="text-4xl text-center">Login<span class="text-primary">.</span></h1>
            <form class="mt-12 w-[420px]" action="/login" method="POST">
                @csrf

                <!-- Email -->
                <div class="mt-6 w-full">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="dominic@email.com"
                        class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2"
                        required value="{{ old('email') }}">
                </div>

                <!-- Password -->
                <div class="w-full mt-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="********"
                        class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2"
                        required>
                </div>

                <!-- error messages -->
                @if ($errors->has('email'))
                    <p class="text-primary text-center text-sm mt-4">{{ $errors->first('email') }}</p>
                @endif

                <button type="submit"
                    class="w-full bg-primary hover:bg-[#750000] text-white px-6 py-2 rounded-[4px] mt-10">
                    Login
                </button>
            </form>

            <p class="text-black text-center mt-5">
                Don't have an account? <a href="/register" class="underline text-primary">Create Account</a>
            </p>
        </main>

        <x-layout_components.footer></x-layout_components.footer>
    </div>
</x-layout>
