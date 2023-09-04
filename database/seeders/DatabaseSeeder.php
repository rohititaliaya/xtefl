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
        $plan = [
            ['id' => '1',
         'name' => 'Free Plan',
         'slug' => 'basic',
         'stripe_plan' => 'price_1LSNQwDk3ug0X5lz3A1CY2MV',
         'price' => '10',
         'description' => 'Basic',
         'created_at' => '2023-05-23 05:56:34',
         'updated_at' => '2023-05-23 05:56:34'],
         
         ['id' => '2',
         'name' => 'Premium',
         'slug' => 'premium',
         'stripe_plan' => 'price_1LSNRXDk3ug0X5lzo3p4DOMJ',
         'price' => '20',
         'description' => 'Premium',
         'created_at' => '2023-05-23 05:56:34',
         'updated_at' => '2023-05-23 05:56:34']];

         \App\Models\Plan::insert($plan);
    }
}
