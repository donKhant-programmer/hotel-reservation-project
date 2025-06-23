<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <i class="fas fa-hotel text-blue-600 text-2xl mr-2"></i>
                <span class="text-xl font-bold text-gray-800">Paradise Hotel</span>
            </div>

            <!-- Menu Items -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Main Navigation -->
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }} px-3 py-2">Home</a>
                <a href="{{ route('rooms') }}" class="{{ request()->routeIs('rooms') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }} px-3 py-2">Rooms</a>
                <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking*') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }} px-3 py-2">Book Now</a>

                @auth
                    <!-- Logged-in User Info & Links -->
                    <div class="flex items-center space-x-6 ml-4">
                        <span class="text-gray-700 px-3 py-2">
                            Welcome, <span class="font-medium">{{ Auth::user()->name }}</span>
                        </span>

                        <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }} px-3 py-2">
                            My Profile
                        </a>

                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }} px-3 py-2">
                                Admin
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth

                @guest
                    <!-- Guest User Links -->
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Login</a>
                    <a href="{{ route('register') }}" class="ml-2 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
