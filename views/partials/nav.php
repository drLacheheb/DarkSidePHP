<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                           class="<?= urlIs("/") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?>  rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">Home</a>
                        <a href="/notes"
                           class="<?= urlIs("/notes") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?>  rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">Notes</a>
                        <a href="/about"
                           class="<?= urlIs("/about") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?>  rounded-md px-3 py-2 text-sm font-medium">About</a>
                        <a href="/contact"
                           class="<?= urlIs("/contact") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <?php if (isset($_SESSION['user'])): ?>
                                <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png"
                                         alt="">
                                </button>
                            <?php else: ?>
                                <a href="/register"
                                   class="<?= urlIs("/register") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?>  rounded-md px-3 py-2 text-sm font-medium"
                                   aria-current="page">Register</a>
                                <a href="/login"
                                   class="<?= urlIs("/login") ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?>  rounded-md px-3 py-2 text-sm font-medium"
                                   aria-current="page">Login</a>
                            <?php endif; ?>
                        </div>
                        <!-- hidden util you add some functionality to open and expand -->
                        <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                             id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                             tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <!--
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                               id="user-menu-item-1">Settings</a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:text-black"
                               role="menuitem" tabindex="-1" id="user-menu-item-2">
                                Sign out
                            </a>
                            -->
                            <form action="/session" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:text-black" type="submit">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        id="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false">
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="menu-icon h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="close-icon  hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- hidden util you add some functionality to open and expand -->
    <div class="z-50 hidden md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="/"
               class="block <?= urlIs("/") ? "bg-gray-900 text-white" : "text-gray-300 " ?>  rounded-md px-3 py-2 text-base font-medium"
               aria-current="page">Home</a>
            <a href="/notes"
               class="block <?= urlIs("/notes") ? "bg-gray-900 text-white" : "text-gray-300 " ?>  rounded-md px-3 py-2 text-base font-medium"
               aria-current="page">Notes</a>
            <a href="/about"
               class="block <?= urlIs("/about") ? "bg-gray-900 text-white" : "text-gray-300 " ?>  rounded-md px-3 py-2 text-base font-medium">About</a>
            <a href="/contact"
               class="block <?= urlIs("/contact") ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-base font-medium">Contact</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png"
                         alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">User</div>
                    <div class="text-sm font-medium leading-none text-gray-400">User@example.com</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <!--
                 <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                    Your Profile
                </a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                    Settings
                </a>
                -->
                <a href="/logout"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                    Sign out
                </a>
                <form action="/session" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                            type="submit">
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    const menuButton = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-menu');

    // Toggle the dropdown menu
    menuButton.addEventListener('click', (event) => {
        menu.classList.toggle('hidden');
        event.stopPropagation(); // Prevent this click from bubbling up to the document
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        const isClickInside = menu.contains(event.target) || menuButton.contains(event.target);
        if (!isClickInside) {
            menu.classList.add('hidden'); // Add 'hidden' to close the menu
        }
    });

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileMenuButton.querySelector('.menu-icon');
    const closeIcon = mobileMenuButton.querySelector('.close-icon');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');

        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>
