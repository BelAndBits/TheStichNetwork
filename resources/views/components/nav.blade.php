<!-- Navigation bar with dynamic padding and logo resizing for responsive design -->
<nav class="bg-[#F8F3E6] text-[#544343] shadow-lg fixed top-0 w-full z-50 lg:static lg:shadow-none">
    <div class="container mx-auto px-4 sm:px-8 lg:px-8">
        <div class="flex justify-between items-center py-2 md:py-3 lg:py-4"> <!-- Adjusting padding for different screen sizes -->
            <!-- Logo section with responsive image sizing -->
            <div class="flex items-center space-x-4">
                <!-- Mobile Logo -->
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="The Stitch Network" 
                         class="h-8 md:h-10 lg:h-26 w-auto"> <!-- Resizing logo for different screens -->
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/patterns" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Patterns</a>
                <a href="/materials" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Materials</a>
                <a href="/library" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Projects</a>
                <a href="/about" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">About Us</a>
            </div>

            <!-- User Section -->
            <div class="flex items-center space-x-6">
                <a href="/my-library" class="px-3 py-2 rounded hover:bg-[#A8C3A5] transition font-bold">
                    My Library
                </a>
                @auth
                    <!-- Avatar for Logged-In Users -->
                    <div class="relative">
                        <a href="#" class="block avatar-link">
                            <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" 
                                alt="Avatar" 
                                class="h-10 w-10 inset-0 bg-green opacity-50 rounded-full border-2 border-[#A8C3A5]">
                        </a>
                        <div class="absolute hidden bg-white shadow-lg rounded px-2 py-1 text-sm w-48 -translate-x-1/2 left-1/2 mt-2 user-menu" id="user-menu">
                            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                            <div class="border-b my-2"></div>
                            <a href="/logout" class="block px-4 py-2 hover:bg-gray-100"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Log In Button -->
                    <a href="/login" 
                       class="px-4 py-2 bg-[#F5D5A4] font-bold rounded-full shadow hover:bg-[#A8C3A5] hover:text-[#544343] transition">
                        Log In
                    </a>
                @endauth
            </div>

            <!-- Hamburger Menu Button for Mobile -->
            <button id="menu-toggle" class="block md:hidden text-[#544343] hover:text-[#F5D5A4]">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:static flex-col space-y-4 mt-4 md:hidden">
            <a href="/patterns" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Patterns</a>
            <a href="/materials" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Materials</a>
            <a href="/library" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">Projects</a>
            <a href="/about-us" class="px-3 py-2 rounded hover:bg-[#A8C3A5] hover:text-white transition font-bold">About Us</a>
        </div>
    </div>
</nav>
