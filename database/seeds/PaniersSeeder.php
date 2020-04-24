<?php

use Illuminate\Database\Seeder;
use App\Panier;

class PaniersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Panier::class, 10)->create();
    }
}
