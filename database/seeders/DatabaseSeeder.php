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
        $seats = [];

        for ($i=1; $i < 5; $i++) { 
            for ($j=1; $j < 6; $j++) { 
                array_push($seats, chr(0x40 + $i) . $j);
            }
        }

        foreach ($seats as $seat) {
            \App\Models\Seat::factory()->create(['seat' => $seat]);
        }

        \App\Models\Menu::factory()->createMany([
            [
                'name' => 'Americano',
                'category' => 'Coffee',
                'desc' => 'Minuman ini adalah perpaduan antara air putih dengan 2 shot espresso.',
                'img' => 'image/coffee-americano.png',
                'price' => 15000
            ],
            [
                'name' => 'Capuccino',
                'category' => 'Coffee',
                'desc' => 'Campuran 1 shot espresso dengan steam susu freshmilk.',
                'img' => 'image/coffee-capuccino.png',
                'price' => 18000
            ],
            [
                'name' => 'Matcha Latte',
                'category' => 'Coffee',
                'desc' => 'Campuran bubuk matcha, gula dan steam susu.',
                'img' => 'image/matcha-latte.png',
                'price' => 18000
            ],
            [
                'name' => 'Red Velvet Latte',
                'category' => 'Coffee',
                'desc' => 'Campuran bubuk red velvet, gula dan steam susu.',
                'img' => 'image/red-velvet-latte.png',
                'price' => 18000
            ],
            [
                'name' => 'Rum Regal Latte',
                'category' => 'Coffee',
                'desc' => 'Campuran syrup rum, 1 shot espresso, steam susu, dan taburan regal.',
                'img' => 'image/rum-regal.png',
                'price' => 20000
            ],
            [
                'name' => 'Lotus Biscoff Latte',
                'category' => 'Coffee',
                'desc' => 'Campuran gula, 1 shot espresso, steam susu, selai lotus, dan taburan biskuit lotus.',
                'img' => 'image/lotus-biscoff-latte.png',
                'price' => 20000
            ],
            [
                'name' => 'Blueberry Ade',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup blueberry, syrup, dan campuran air lemon dengan soda.',
                'img' => 'image/blueberry-ade.png',
                'price' => 18000
            ],
            [
                'name' => 'Strawberry Milkshake',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup gula, susu kental manis, buah strawberry dan susu.',
                'img' => 'image/strawberry-milkshake.png',
                'price' => 22000
            ],
            [
                'name' => 'Peach Juice',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup gula, susu kental manis, buah peach dan sedikit air.',
                'img' => 'image/peach-juice.png',
                'price' => 18000
            ],
            [
                'name' => 'Pineapple Juice',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup gula, susu kental manis, buah nanas dan sedikit air.',
                'img' => 'image/pineapple-juice.png',
                'price' => 18000
            ],
            [
                'name' => 'Chocolate Milkshake',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup gula, bubuk coklat, susu kental manis coklat, dan susu.',
                'img' => 'image/chocolate-milkshake.png',
                'price' => 22000
            ],
            [
                'name' => 'Choco Mint Milkshake',
                'category' => 'Non-Coffee',
                'desc' => 'Campuran syrup gula, bubuk mint, susu kental manis, dan susu.',
                'img' => 'image/chocolate-mint-milkshake.png',
                'price' => 22000
            ],
            [
                'name' => 'Potato Fries',
                'category' => 'Snack',
                'desc' => 'Kentang goreng ditaburi dengan parsley dan cocolan saus sambal serta mayones.',
                'img' => 'image/fries.png',
                'price' => 15000
            ],
            [
                'name' => 'Cireng Set',
                'category' => 'Snack',
                'desc' => 'Set cireng goreng aneka rasa, 3 cireng original, 3 cireng keju, 3 cireng rujak.',
                'img' => 'image/cireng-set.png',
                'price' => 10000
            ],
            [
                'name' => 'Mendoan Set',
                'category' => 'Snack',
                'desc' => 'Tempe yang digoreng dengan minyak panas menghasilkan rasa yang crispy dengan bumbu kecap cabai.',
                'img' => 'image/mendoan-set.png',
                'price' => 10000
            ],
            [
                'name' => 'Sate Taichan',
                'category' => 'Snack',
                'desc' => 'Sate ayam yang digoreng menjadikan ayam yang juicy dengan sambal racikan rahasia.',
                'img' => 'image/sate-taichan.png',
                'price' => 15000
            ],
            [
                'name' => 'Tahu Crispy',
                'category' => 'Snack',
                'desc' => 'Tahu yang digoreng dengan tepung crispy.',
                'img' => 'image/tahu-crispy.png',
                'price' => 10000
            ],
        ]);
    }
}
