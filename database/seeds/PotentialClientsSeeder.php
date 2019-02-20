<?php

use Illuminate\Database\Seeder;

class PotentialClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PotentialClients::class, 5)->create();
    }
}
