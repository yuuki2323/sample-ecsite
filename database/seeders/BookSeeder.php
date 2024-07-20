<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run()
    {
        // 手動でカテゴリIDを指定
        $englishCategoryId = 5; // 英語カテゴリのID
        $mathCategoryId = 6; // 数学カテゴリのID
        $bookkeepingCategoryId = 7; // 簿記カテゴリのID
        $taxAccountantCategoryId = 8; // 税理士カテゴリのID

        $books = [
            // 英語
            [
                'category_id' => $englishCategoryId,
                'title' => 'English Grammar for Beginners',
                'description' => 'A comprehensive guide to English grammar for beginners.',
                'image_path' => 'https://example.com/english1.jpg',
                'price' => 20.00,
                'stock' => 10,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $englishCategoryId,
                'title' => 'Advanced English Vocabulary',
                'description' => 'Expand your vocabulary with advanced English words and phrases.',
                'image_path' => 'https://example.com/english2.jpg',
                'price' => 25.00,
                'stock' => 15,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $englishCategoryId,
                'title' => 'English Conversation Practice',
                'description' => 'Practical exercises for improving your English conversation skills.',
                'image_path' => 'https://example.com/english3.jpg',
                'price' => 18.00,
                'stock' => 8,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 数学
            [
                'category_id' => $mathCategoryId,
                'title' => 'Basic Algebra',
                'description' => 'An introduction to algebraic principles and techniques.',
                'image_path' => 'https://example.com/math1.jpg',
                'price' => 30.00,
                'stock' => 12,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $mathCategoryId,
                'title' => 'Calculus Made Easy',
                'description' => 'Simplifying complex calculus concepts for easy understanding.',
                'image_path' => 'https://example.com/math2.jpg',
                'price' => 35.00,
                'stock' => 10,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $mathCategoryId,
                'title' => 'Geometry for Beginners',
                'description' => 'Understanding basic geometry principles and applications.',
                'image_path' => 'https://example.com/math3.jpg',
                'price' => 28.00,
                'stock' => 14,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 簿記
            [
                'category_id' => $bookkeepingCategoryId,
                'title' => 'Bookkeeping Basics',
                'description' => 'An introduction to basic bookkeeping principles and practices.',
                'image_path' => 'https://example.com/bookkeeping1.jpg',
                'price' => 22.00,
                'stock' => 9,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $bookkeepingCategoryId,
                'title' => 'Advanced Bookkeeping Techniques',
                'description' => 'Advanced techniques and methods in bookkeeping.',
                'image_path' => 'https://example.com/bookkeeping2.jpg',
                'price' => 27.00,
                'stock' => 13,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $bookkeepingCategoryId,
                'title' => 'Practical Bookkeeping Exercises',
                'description' => 'Hands-on exercises for improving your bookkeeping skills.',
                'image_path' => 'https://example.com/bookkeeping3.jpg',
                'price' => 20.00,
                'stock' => 11,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 税理士
            [
                'category_id' => $taxAccountantCategoryId,
                'title' => 'Taxation Principles',
                'description' => 'Understanding the basic principles of taxation.',
                'image_path' => 'https://example.com/tax1.jpg',
                'price' => 40.00,
                'stock' => 7,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $taxAccountantCategoryId,
                'title' => 'Advanced Tax Strategies',
                'description' => 'Exploring advanced strategies in tax planning and management.',
                'image_path' => 'https://example.com/tax2.jpg',
                'price' => 45.00,
                'stock' => 5,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $taxAccountantCategoryId,
                'title' => 'Practical Tax Applications',
                'description' => 'Applying tax principles to real-world scenarios.',
                'image_path' => 'https://example.com/tax3.jpg',
                'price' => 38.00,
                'stock' => 6,
                'status' => 'in_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('books')->insert($books);
    }
}
