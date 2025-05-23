<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Paradise Hotel</h3>
                <p class="text-gray-400">Luxury accommodations with world-class service in the heart of the city.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="{{ route('rooms') }}" class="text-gray-400 hover:text-white">Rooms</a></li>
                    <li><a href="{{ route('booking') }}" class="text-gray-400 hover:text-white">Book Now</a></li>
                    @auth
                        <li><a href="{{ route('user.dashboard') }}" class="text-gray-400 hover:text-white">My Bookings</a></li>
                        <li><a href="{{ route('profile') }}" class="text-gray-400 hover:text-white">My Profile</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Luxury Ave, City</li>
                    <li><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</li>
                    <li><i class="fas fa-envelope mr-2"></i> info@paradisehotel.com</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Newsletter</h4>
                <p class="text-gray-400 mb-4">Subscribe for special offers and updates</p>
                <form class="flex" action="" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Your email" class="px-4 py-2 rounded-l-md w-full">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-md">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ now()->year }} Paradise Hotel. All rights reserved.</p>
        </div>
    </div>
</footer>