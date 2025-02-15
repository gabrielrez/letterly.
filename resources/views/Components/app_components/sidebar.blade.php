<section class="h-[70vh] min-w-[202px] border-r border-detail border-dashed pr-24 flex flex-col justify-between sticky top-32">
    <ul class="flex flex-col gap-12">
        <li>
            <a href="/home" class="{{ request()->is('home*') ? 'text-primary underline' : 'text-black' }} hover:underline"><i class="fa-regular fa-newspaper mr-2"></i></i>Home</a>
        </li>
        <li>
            <a href="/profile" class="{{ request()->is('profile*') ? 'text-primary underline' : 'text-black' }} hover:underline"><i class="fa-regular fa-user mr-2"></i> My Profile</a>
        </li>
        <li>
            <a href="/home" id="search" class="{{ request()->is('search*') ? 'text-primary underline' : 'text-black' }} hover:underline"><i class="fa-solid fa-magnifying-glass mr-2"></i> Search</a>
        </li>
        <li>
            <a href="/home" class="{{ request()->is('settings*') ? 'text-primary underline' : 'text-black' }} hover:underline"><i class="fa-solid fa-gear mr-2"></i> Settings</a>
        </li>
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button class="hover:underline"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Sign out</button>
            </form>
        </li>
    </ul>
    <p class="text-gray text-sm mt-12">© 2025 Letterly.</p>
</section>