<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Menu::factory(10)->create();

        $seats = [];

        for ($i=1; $i < 5; $i++) { 
            for ($j=1; $j < 6; $j++) { 
                array_push($seats, chr(0x40 + $i) . $j);
            }
        }

        foreach ($seats as $seat) {
            \App\Models\Seat::factory()->create(['seat' => $seat]);
        }
    }
}
