<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    // database/seeders/RoomTypeSeeder.php
public function run()
{
    \App\Models\RoomType::insert([
        ['name' => 'Standard', 'description' => 'Basic room', 'max_guests' => 2, 'price_per_night' => 100],
        ['name' => 'Deluxe', 'description' => 'Spacious room with view', 'max_guests' => 3, 'price_per_night' => 150],
    ]);
}

}
