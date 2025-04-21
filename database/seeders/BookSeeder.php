<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            "To Kill a Mockingbird",
            "1984",
            "The Great Gatsby",
            "The Catcher in the Rye",
            "The Lord of the Rings",
            "Pride and Prejudice",
            "Harry Potter and the Sorcerer’s Stone",
            "The Hobbit",
            "Fahrenheit 451",
            "Moby-Dick",
            "The Alchemist",
            "War and Peace",
            "Brave New World",
            "The Chronicles of Narnia",
            "Crime and Punishment",
            "The Book Thief",
            "The Hunger Games",
            "The Da Vinci Code",
            "Animal Farm",
            "Dune"
        ];

        foreach ($books as $book) {
            DB::table('books')->insert([
                'name' => $book,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
