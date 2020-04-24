<?php

use Illuminate\Database\Seeder;
use App\Produit;

class ProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produit::class, 10)->create();
    }
}
