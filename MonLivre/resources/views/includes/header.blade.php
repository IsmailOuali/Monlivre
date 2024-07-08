    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2"></div>
        <div class="relative w-1/2 flex justify-end">
            <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
    </header>

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>

        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
            <a href="index.html"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Gestion des Auteurs
            </a>
            <a href="tables.html"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-table mr-3"></i>
                Gestion des livres
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </a>
        </nav>
    </header>