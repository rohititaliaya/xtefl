<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::insert(array(
            array('id' => '1','name' => 'Accounting','slug' => 'accounting','category_id' => '1','created_at' => '2022-12-14 03:25:51','updated_at' => '2022-12-14 03:25:51'),
            array('id' => '2','name' => 'Accounting','slug' => 'accounting','category_id' => '2','created_at' => '2022-12-14 03:26:13','updated_at' => '2022-12-14 03:26:13'),
            array('id' => '3','name' => 'Bussiness','slug' => 'bussiness','category_id' => '1','created_at' => '2022-12-14 03:26:26','updated_at' => '2022-12-14 03:26:26'),
            array('id' => '4','name' => 'Bussiness','slug' => 'bussiness','category_id' => '2','created_at' => '2022-12-14 03:26:33','updated_at' => '2022-12-14 03:26:33')
          ));
    }
}
