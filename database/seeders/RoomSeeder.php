<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Deluxe King Room',
                'description' => 'Spacious room with a king-sized bed, en-suite bathroom, and city view. Perfect for couples or business travelers seeking comfort and luxury.',
                'price_per_night' => 199.99,
                'thumbnail' => 'rooms/deluxe-king.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'King',
                'size' => 400,
                'is_featured' => true,
            ],
            [
                'name' => 'Twin Room',
                'description' => 'Comfortable room with two twin beds, perfect for friends or family members traveling together. Includes a private bathroom and workspace.',
                'price_per_night' => 149.99,
                'thumbnail' => 'rooms/twin-room.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'Twin',
                'size' => 350,
                'is_featured' => true,
            ],
            [
                'name' => 'Family Suite',
                'description' => 'Spacious suite with a king bed and sofa bed, ideal for families. Features a separate living area, two TVs, and a large bathroom with a tub.',
                'price_per_night' => 299.99,
                'thumbnail' => 'rooms/family-suite.jpg',
                'max_occupancy' => 4,
                'bed_type' => 'King + Sofa Bed',
                'size' => 600,
                'is_featured' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
