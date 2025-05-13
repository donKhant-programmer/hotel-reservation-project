<div class="bg-white rounded-lg shadow hover:shadow-lg transition">
    <img src="{{ asset('storage/' . $room->thumbnail) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <h3 class="text-xl font-semibold mb-2">{{ $room->name }}</h3>
        <p class="text-gray-600 mb-2">{{ Str::limit($room->description, 80) }}</p>
        <p class="font-bold text-yellow-600">${{ $room->price_per_night }} / night</p>
        <a href="{{ route('rooms.show', $room->id) }}" class="inline-block mt-3 text-blue-600 hover:underline">View Details</a>
    </div>
</div>
