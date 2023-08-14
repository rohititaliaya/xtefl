<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(
            array(
                array('name' => 'Study Abroad','slug' => 'study-abroad','ctitle' => 'Study abroad programs','short_desc' => 'Study abroad programs','created_at' => '2022-12-14 03:24:58','updated_at' => '2022-12-14 03:24:58'),
                array('name' => 'Intern abroad','slug' => 'intern-abroad','ctitle' => 'Intern abroad programs','short_desc' => 'Intern abroad programs','created_at' => '2022-12-14 03:25:32','updated_at' => '2022-12-14 03:25:32')
            )
        );
    }
}
