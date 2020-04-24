<?php

use Illuminate\Database\Seeder;
use App\Commande;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Commande::class, 10)->create();
    }
}
