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
        $this->call(
            [
                \Database\Seeders\CategorySeeder::class,
                \Database\Seeders\SubCategorySeeder::class,
                \Database\Seeders\CountrySeeder::class,
                \Database\Seeders\CitySeeder::class,
            ]
        );


    }
}
