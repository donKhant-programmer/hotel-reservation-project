<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    // database/seeders/RoomTypeSeeder.php
    public function run(): void
    {
        RoomType::create([
            'name' => 'Standard Room',
            'description' => 'A comfortable room with essential amenities.',
            'base_price' => 79.99,
            'capacity' => 2,
            'amenities' => ['Free Wi-Fi', 'Air Conditioning', 'Flat-screen TV']
        ]);

        RoomType::create([
            'name' => 'Deluxe Room',
            'description' => 'Spacious deluxe room with extra features.',
            'base_price' => 129.99,
            'capacity' => 3,
            'amenities' => ['Free Wi-Fi', 'Mini Bar', 'Balcony', 'King Bed']
        ]);

        RoomType::create([
            'name' => 'Suite',
            'description' => 'Luxurious suite with separate living area.',
            'base_price' => 199.99,
            'capacity' => 4,
            'amenities' => ['Jacuzzi', 'Mini Bar', 'City View', 'Large Sofa']
        ]);
    }

}
