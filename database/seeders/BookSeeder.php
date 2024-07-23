<?php
namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Book::factory()->count(10)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
