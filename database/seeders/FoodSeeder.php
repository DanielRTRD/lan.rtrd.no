<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Food::firstOrCreate([
            'name' => 'Chilli con carne med rotmos',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Tandoori kylling med poteter',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Karbonade m/ grønnsaksstuing',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Stekt ørretfilet m/chili kokossris m/ bønneblandning og hvite rosiner',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Svinegryte Provencal med ratatouille og potet',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Kremet viltgryte m/jasminris, rotgrønnsaker og tyttebær',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Orientalske kyllingboller m/ fullkorn couscous og grønnsaker',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Biff med pasta',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Lapskaus med veganske pølser',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Ravioli med surkål, gulrot, svisker, potetmos og Kokosmelksaus',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Fransk gryte med falafelburger, brokkoliblanging og potet',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Økologisk emmer med Kokosmelk, sjampinon og grønnsaker',
            'price' => 89,
            'delivery_at' => '2021-10-17',
        ]);
        Food::firstOrCreate([
            'name' => 'Grønn curry kyllingbryst med ris',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Villtkarbonader med tomatsaus, kålrotstappe og potet',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Arabiskinspirert gryte m/oksekjøtt, bokhvete, erter og gulrot',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Stekt laks m/kokos og lime, asparges, ris og sitron hvitsaus',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Coq au vin servert med ris',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Lasagne bolognese med strimlet kylling',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Tortilla wraps med hawaiinspirert fyll og strimlet kylling',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Pasta bolognese m/karbonadedeig',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Falafelboller med coucous',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Gryte med veganpølser, sopp, løk, erter og kokte poteter',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Wok med våruller',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
        Food::firstOrCreate([
            'name' => 'Vegansk: Burger med blomkålsaus, brokkoli, potetmos og tyttebær',
            'price' => 89,
            'delivery_at' => '2021-10-24',
        ]);
    }
}
