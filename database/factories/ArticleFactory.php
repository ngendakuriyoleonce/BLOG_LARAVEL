<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'title' =>$this-> faker->sentence(6,true),
        'description' =>$this-> faker->paragraph(3,true),
           'image'=> 'images/1.png',
           'user_id' => User::factory(),
'category_id' => Category::factory(),
        ];
    }
}
