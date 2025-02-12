<x-layout>
    <div class="flex flex-col justify-between h-screen">
        <x-layout_components.header></x-layout_components.header>

        <main class="mx-auto">
            <h1 class="text-4xl text-center">Create Account<span class="text-primary">.</span></h1>
            <form class="mt-12 w-[420px]" action="/register" method="POST">
                @csrf
                <div class="mt-6 w-full flex gap-6">
                    <div class="w-full">
                        <label for="first_name">First Name</label>
                        <input 
                            type="text" 
                            name="first_name" 
                            placeholder="Dominique" 
                            class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2"
                            value="{{ $errors->has('first_name') ? '' : old('first_name') }}" 
                            required>
                        @error('first_name') 
                            <p class="text-primary text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="last_name">Last Name</label>
                        <input 
                            type="text" 
                            name="last_name" 
                            placeholder="Decocco" 
                            class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2"
                            value="{{ $errors->has('last_name') ? '' : old('last_name') }}" 
                            required>
                        @error('last_name') 
                            <p class="text-primary text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>
                <div class="mt-6 w-full">
                    <label for="email">E-mail</label>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="dominic@email.com" 
                        class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2"
                        value="{{ $errors->has('email') ? '' : old('email') }}" 
                        required>
                    @error('email') 
                        <p class="text-primary text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>
                <div class="mt-6 w-full flex gap-6">
                    <div class="w-full">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="••••••" 
                            class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2" 
                            required>
                        @error('password') 
                            <p class="text-primary text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="password_confirmation">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="••••••" 
                            class="border border-primary w-full rounded-[4px] mt-2 px-4 py-2" 
                            required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-[#750000] text-white px-6 py-2 rounded-[4px] mt-10">Create Account</button>
            </form>
            <p class="text-black text-center mt-5">Already have an account? <a href="/login" class="underline text-primary">Login</a></p>
        </main>

        <x-layout_components.footer></x-layout_components.footer>
    </div>
</x-layout>
