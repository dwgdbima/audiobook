<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::create([
            'title' => 'Bisa Bikin Brand',
            'author' => 'Subiakto Priosoedarsono',
            'desc' => '<p>Bukan sekedar buku, ini adalah Kitab panduan BISA BIKIN BRAND karangan Subiakto Priosoedarsono atau yang akrab disapa Pak Bi, seorang Praktisi Branding dengan pengalaman 54 tahun di dunia branding.</p>
                    <p>Pak Bi berhasil membranding brand-brand besar nasional seperti KOPIKO dengan taglinenya Gantinya Ngopi, Indomie Seleraku, Extra Jos, Kartu AS Telkomsel, Paspor BCA serta berhasil membangun personal brand dan mengantar Pak SBY-JK terpilih menjadi Presiden dan Wakil Presiden Indonesia lewat Pemilihan umum lansung, dan ratusan brand-brand nasional lainnya buah karya Pak Bi.</p>
                    <p>Kitab BISA BIKIN BRAND 1 membahas tuntas Branding Marketing dan Selling dari sudut pandang seorang Praktisi Brand dengan pengalaman 54 tahun di dunia Branding.</p>',
            'cover' => 'storage/bisabikinbrand.jpg'
        ]);

        $product_1 = $book->products()->create([
            'name' => 'Bundle 1',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_1->chapters()->createMany([
            [
                'title' => 'Kata Pengantar',
                'audio' => 'storage/bisa-bikin-brand/kata-pengantar.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 1. LOGIKA BISNIS BAGI AWAM',
                'audio' => 'storage/bisa-bikin-brand/chapter-1.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 2. LOGIKA BISNIS BAGI AWAM',
                'audio' => 'storage/bisa-bikin-brand/chapter-2.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 3. BUSSINES AS USUAL',
                'audio' => 'storage/bisa-bikin-brand/chapter-3.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 4. Branding, Marketing, Selling',
                'audio' => 'storage/bisa-bikin-brand/chapter-4.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 5. MARKETING MODERN',
                'audio' => 'storage/bisa-bikin-brand/chapter-5.mp3',
                'book_id' => 1
            ],
        ]);
        
        $product_2 = $book->products()->create([
            'name' => 'Bundle 2',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_2->chapters()->createMany([
            [
                'title' => 'Chapter 6. SEGMENT TARGET MARKET',
                'audio' => 'storage/bisa-bikin-brand/chapter-6.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 7. MARKETING 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-7.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 8. Produk dan Jasa 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-8.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 9. UNIQUE SELLING PROPOTITION',
                'audio' => 'storage/bisa-bikin-brand/chapter-9.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 10. Harga',
                'audio' => 'storage/bisa-bikin-brand/chapter-10.mp3',
                'book_id' => $book->id
            ],
        ]);

        $product_3 = $book->products()->create([
            'name' => 'Bundle 3',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_3->chapters()->createMany([
            [
                'title' => 'Chapter 11. Distribusi (place)',
                'audio' => 'storage/bisa-bikin-brand/chapter-11.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 12. Promosi (Promotion)',
                'audio' => 'storage/bisa-bikin-brand/chapter-12.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 13. ADOPTION CATEGORY',
                'audio' => 'storage/bisa-bikin-brand/chapter-13.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 14. MARKETING 5Ps',
                'audio' => 'storage/bisa-bikin-brand/chapter-14.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 15. MARKETING 6Ps',
                'audio' => 'storage/bisa-bikin-brand/chapter-15.mp3',
                'book_id' => $book->id
            ],
        ]);

        $product_4 = $book->products()->create([
            'name' => 'Bundle 4',
            'price' => 50000,
            'status' => 1,
        ]);


        $product_4->chapters()->createMany([
            [
                'title' => 'Chapter 16. MARKETING 7Ps',
                'audio' => 'storage/bisa-bikin-brand/chapter-16.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 17. SELLING 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-17.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 18. TARGET PERSONA 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-18.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 19. BRANDING 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-19.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 20. LOGO 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-20.mp3',
                'book_id' => $book->id
            ],
        ]);
    }
}
