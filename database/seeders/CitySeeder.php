<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
		DB::table('cities')->insert(
			array(
        array('id' => '1','name' => 'Delhi','slug' => 'delhi','country_id' => '2','created_at' => '2022-12-14 03:27:49','updated_at' => '2022-12-14 03:27:49'),
        array('id' => '2','name' => 'Toronto','slug' => 'toronto','country_id' => '1','created_at' => '2022-12-14 03:28:05','updated_at' => '2022-12-14 03:28:05')
      )
		);
    }
}
