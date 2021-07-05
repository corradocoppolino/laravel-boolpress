<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            'HTML',
            'CSS',
            'JS',
            'PHP'
        ];

        foreach ($data as $element) {
            
            $new_category = new Category();
            $new_category->name=$element;
            $new_category->slug=Str::slug($element,'-');
            $new_category->save();
        }

    }
}
