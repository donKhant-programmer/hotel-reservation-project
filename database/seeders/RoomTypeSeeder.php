<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    // database/seeders/RoomTypeSeeder.php

public function run()
    {
        $roomTypes = [
            [
                'name' => 'Standard',
                'description' => 'Basic room with essential amenities.',
                'max_guests' => 2,
                'price_per_night' => 50.00,
            ],
            [
                'name' => 'Deluxe',
                'description' => 'Spacious room with extra facilities.',
                'max_guests' => 3,
                'price_per_night' => 100.00,
            ],
            [
                'name' => 'Suite',
                'description' => 'Large suite with luxury amenities.',
                'max_guests' => 4,
                'price_per_night' => 150.00,
            ],
        ];

        foreach ($roomTypes as $type) {
            RoomType::create($type);
        }
    }

}
