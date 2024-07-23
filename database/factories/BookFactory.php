<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [

            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image_path' => 'public/book.png',
            'price' => $this->faker->numberBetween(1000, 5000),
            'stock' => $this->faker->numberBetween(0, 30),
            'status' => $this->faker->randomElement(['in_stock', 'soldout']),

        ];
    }
}
