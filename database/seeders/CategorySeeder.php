<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => '英語', 'slug' => 'english'],
            ['name' => '数学', 'slug' => 'mathematics'],
            ['name' => '簿記', 'slug' => 'bookkeeping'],
            ['name' => '税理士', 'slug' => 'tax-accountant'],
        ];

        DB::table('categories')->insert($categories);
    }
}
