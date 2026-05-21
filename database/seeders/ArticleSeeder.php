<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
             'title' => 'Title 1',
        'description' => 'This is article description',
           'image'=> 'images/1.png',
           'user_id' => 1,
           'category_id'=> 2,
        ]);
        Article::create([
             'title' => 'Title 1',
        'description' => 'This is article description',
           'image'=> 'images/2.png',
           'user_id'=> 1,
           'category_id'=> 2,
        ]);
    }
}
