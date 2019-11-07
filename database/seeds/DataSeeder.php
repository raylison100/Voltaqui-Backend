<?php

use App\Entities\Client;
use App\Entities\Restaurant;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 15)->create();

        factory(Client::class, 30)->create();
    }
}
