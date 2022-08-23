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

        \App\Models\Order::factory()->create([
            'quantity' => 0,
            'total' => 0,
            'customer_id' => 1
        ]);

        \App\Models\Customer::factory()->create([
            'name' => 'Fanny Maulana',
            'order_id' => 1
        ]);
    }
}
