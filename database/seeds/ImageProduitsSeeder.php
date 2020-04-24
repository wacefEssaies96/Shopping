<?php

use Illuminate\Database\Seeder;
use App\ImageProduit;

class ImageProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ImageProduit::class, 10)->create();
    }
}
