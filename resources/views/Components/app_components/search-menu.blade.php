<section class="pb-10 w-full flex items-center gap-12">
    <ul class="flex gap-12 min-w-max">
        <li>
            <a href="/home" class="text-primary underline">For You</a>
        </li>
        <li>
            <a href="/home" class="hover:underline">Following</a>
        </li>
    </ul>
    <form action="" class="w-full">
        @csrf
        <input type="text" placeholder="Search..." id="search_input" class="w-full px-7 py-2 rounded-[4px] border border-black text-black">
    </form>
</section>