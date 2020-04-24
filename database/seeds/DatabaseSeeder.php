<?php

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
        $this->call(UsersSeeder::class);
        $this->call(ProduitsSeeder::class);
        $this->call(CommandesSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(DemendesSeeder::class);
        $this->call(ImageProduitsSeeder::class);
        $this->call(PaniersSeeder::class);
        
    }
}
