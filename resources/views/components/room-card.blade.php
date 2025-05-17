<div class="bg-white rounded-lg shadow hover:shadow-lg transition">
    <img src="{{ asset($room->thumbnail) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <h3 class="text-xl font-semibold mb-2">{{ $room->name }}</h3>
        <p class="text-gray-600 mb-2">{{ Str::limit($room->description, 80) }}</p>
        <p class="font-bold text-yellow-600 mb-3">${{ $room->price_per_night }} / night</p>
        <a href="{{ route('rooms.show', $room->id) }}" class="block w-full text-center bg-red-600 text-white font-medium py-2 px-4 rounded hover:bg-red-700">View Details</a>
    </div>
</div>