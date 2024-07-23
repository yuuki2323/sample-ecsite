<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::factory()->state([
            'name' => 'english',
            'slug' => Str::slug('english'),
        ])->create();

        Category::factory()->state([
            'name' => 'mathematics',
            'slug' => Str::slug('mathematics'),
        ])->create();

        Category::factory()->state([
            'name' => 'bookkeeping',
            'slug' => Str::slug('bookkeeping'),
        ])->create();

        Category::factory()->state([
            'name' => 'tax-accountant',
            'slug' => Str::slug('tax-accountant'),
        ])->create();
    }
}
