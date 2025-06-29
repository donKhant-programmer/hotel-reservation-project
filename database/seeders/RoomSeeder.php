<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $standard = RoomType::where('name', 'Standard Room')->first();
        $deluxe = RoomType::where('name', 'Deluxe Room')->first();
        $suite = RoomType::where('name', 'Suite')->first();

        Room::create([
            'room_number' => '101',
            'room_type_id' => $standard->id,
            'floor' => '1st',
            'description' => 'Cozy standard room near the lobby.',
            'is_featured' => true,
            'image' => 'rooms/standard1.jpg',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => '102',
            'room_type_id' => $standard->id,
            'floor' => '1st',
            'description' => 'Standard room with garden view.',
            'is_featured' => false,
            'image' => 'rooms/standard2.jpg',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => '201',
            'room_type_id' => $deluxe->id,
            'floor' => '2nd',
            'description' => 'Spacious deluxe room with balcony.',
            'is_featured' => true,
            'image' => 'rooms/deluxe1.jpg',
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => '301',
            'room_type_id' => $suite->id,
            'floor' => '3rd',
            'description' => 'Top-floor suite with city view.',
            'is_featured' => true,
            'image' => 'rooms/suite1.jpg',
            'status' => 'available',
        ]);
    }
}
