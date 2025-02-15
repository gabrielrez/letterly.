<header class="sticky top-0 py-5 flex justify-between items-center bg-white">
    <a href="/home"><img class="mx-auto" src="../img/letterly..svg" alt="Letterly logo"></a>
    <div class="flex items-center gap-5">
        <a href="/writings/compose" class="bg-primary hover:bg-[#750000] text-sm font-semibold px-7 py-2 rounded-[4px] text-white flex items-center gap-3">Compose <i class="fa-solid fa-feather"></i></a>
        
        <div class="relative">
            <button id="profile-menu-button" class="flex items-center gap-3 text-primary hover:underline">
                <img src="/img/profile-picture-default.jpg" class="w-10 h-10 border-2 border-primary hover:border-transparent rounded-full object-cover transition duration-200 ease-in-out">
            </button>
            
            <div id="profile-menu" class="hidden absolute right-0 mt-2 w-56 rounded-md bg-white shadow-lg ring-1 ring-black/5">
                <div class="py-1">
                    <a href="/profile" class="block px-4 py-2 text-sm text-black hover:underline">My Profile</a>
                    <hr class="text-detail opacity-30 mx-3 my-1">
                    <a href="/settings" class="block px-4 py-2 text-sm text-black hover:underline">Settings</a>
                    <hr class="text-detail opacity-30 mx-3 my-1">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-primary hover:underline">Sign out</button>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileButton = document.getElementById("profile-menu-button");
        const profileMenu = document.getElementById("profile-menu");

        profileButton.addEventListener("mouseenter", function (event) {
            event.stopPropagation();
            profileMenu.classList.toggle("hidden");
        });

        profileMenu.addEventListener("mouseleave", function(){
            profileMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
            if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.add("hidden");
            }
        });
    });
</script>
