<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
		DB::table('countries')->insert(
			array(
				array('id' => '1','name' => 'Canada','slug' => 'canada','created_at' => '2022-12-14 03:27:16','updated_at' => '2022-12-14 03:27:16'),
				array('id' => '2','name' => 'India','slug' => 'india','created_at' => '2022-12-14 03:27:22','updated_at' => '2022-12-14 03:27:22')
				)
		);
    }
}
