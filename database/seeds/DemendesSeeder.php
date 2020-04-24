<?php

use Illuminate\Database\Seeder;
use App\Demende;
class DemendesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Demende::class, 10)->create();
    }
}
