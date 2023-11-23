<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::find(1);

        $book->chapters()->createMany([
            [
                'title' => 'Kata Pengantar',
                'audio' => 'storage/bisa-bikin-brand/kata-pengantar.mp3'
            ],
            [
                'title' => 'Chapter 1. LOGIKA BISNIS BAGI AWAM',
                'audio' => 'storage/bisa-bikin-brand/chapter-1.mp3'
            ],
            [
                'title' => 'Chapter 2. LOGIKA BISNIS BAGI AWAM',
                'audio' => 'storage/bisa-bikin-brand/chapter-2.mp3'
            ],
            [
                'title' => 'Chapter 3. BUSSINES AS USUAL',
                'audio' => 'storage/bisa-bikin-brand/chapter-3.mp3'
            ],
            [
                'title' => 'Chapter 4. Branding, Marketing, Selling',
                'audio' => 'storage/bisa-bikin-brand/chapter-4.mp3'
            ],
            [
                'title' => 'Chapter 5. MARKETING MODERN',
                'audio' => 'storage/bisa-bikin-brand/chapter-5.mp3'
            ],
        ]);
    }
}
