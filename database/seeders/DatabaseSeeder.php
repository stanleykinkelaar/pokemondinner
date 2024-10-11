<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $colors = [
            'Slate', 'Gray', 'Zinc', 'Neutral',
            'Stone', 'Orange', 'Amber', 'Yellow',
            'Lime', 'Green', 'Emerald', 'Teal',
            'Cyan', 'Sky', 'Blue',
            'Indigo', 'Violet', 'Purple',
            'Fuchsia', 'Pink', 'Rose',
        ];

        foreach ($colors as $color) {
            Card::factory()->create([
                'color' => $color,
            ]);
        }
    }
}
