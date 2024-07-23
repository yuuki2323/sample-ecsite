<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();

        foreach ($books as $book) {
            Review::factory(3)->create([
                'book_id' => $book->id,
            ]);
        }
    }
}
