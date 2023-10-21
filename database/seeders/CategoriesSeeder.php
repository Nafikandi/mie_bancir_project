<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'name_category' => 'MB',
        ]);
        category::create([
            'name_category' => 'M',
        ]);
        category::create([
            'name_category' => 'MR',
        ]);
    }
}
