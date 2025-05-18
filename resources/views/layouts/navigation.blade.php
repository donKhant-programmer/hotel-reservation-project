<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-hotel text-blue-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-gray-800">Paradise Hotel</span>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }}">Home</a>
                <a href="{{ route('rooms') }}" class="{{ request()->routeIs('rooms') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }}">Rooms</a>
                <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking*') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }}">Book Now</a>
                
                @auth
                    <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }}">My Bookings</a>
                    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600' }}">My Profile</a>
                @endauth
                
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Login</a>
                    <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 ml-2">Register</a>
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>