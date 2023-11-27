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


        $product_5 = $book->products()->create([
            'name' => 'Bundle 5',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_5->chapters()->createMany([
            [
                'title' => 'Chapter 21. PACKAGING',
                'audio' => 'storage/bisa-bikin-brand/chapter-21.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 22. SENSORY MARKETING',
                'audio' => 'storage/bisa-bikin-brand/chapter-22.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 23. BMS PLAN 1.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-23.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 24. MARKETING 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-24.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 25. Consumer 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-25.mp3',
                'book_id' => $book->id
            ],
        ]);



        $product_6 = $book->products()->create([
            'name' => 'Bundle 6',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_6->chapters()->createMany([
            [
                'title' => 'Chapter 26. Cost 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-26.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 27. Convenience 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-27.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 28. Communication 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-28.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 29. SELLING 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-29.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 30. BRANDING 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-30.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_7 = $book->products()->create([
            'name' => 'Bundle 7',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_7->chapters()->createMany([
            [
                'title' => 'Chapter 31. EVOKE LIST',
                'audio' => 'storage/bisa-bikin-brand/chapter-31.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 32. TOP OF MIND BRAND',
                'audio' => 'storage/bisa-bikin-brand/chapter-32.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 33. TEN COMMANDMENTS ABOUT BRAND',
                'audio' => 'storage/bisa-bikin-brand/chapter-33.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 34. Brand = Nama + Makna',
                'audio' => 'storage/bisa-bikin-brand/chapter-34.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 35. Brand is Love at First Bite',
                'audio' => 'storage/bisa-bikin-brand/chapter-35.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_8 = $book->products()->create([
            'name' => 'Bundle 8',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_8->chapters()->createMany([
            [
                'title' => 'Chapter 36. Brand is Subconscious Mind',
                'audio' => 'storage/bisa-bikin-brand/chapter-36.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 37. Brand is Top of Mind',
                'audio' => 'storage/bisa-bikin-brand/chapter-37.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 38. Brand is Emotional Bond',
                'audio' => 'storage/bisa-bikin-brand/chapter-38.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 39. Brand is Value',
                'audio' => 'storage/bisa-bikin-brand/chapter-39.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 40. Brand is Trust',
                'audio' => 'storage/bisa-bikin-brand/chapter-40.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_9 = $book->products()->create([
            'name' => 'Bundle 9',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_9->chapters()->createMany([
            [
                'title' => 'Chapter 41. Brand is Jati Diri',
                'audio' => 'storage/bisa-bikin-brand/chapter-41.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 42. Brand is Life Style',
                'audio' => 'storage/bisa-bikin-brand/chapter-42.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 43. Brand is not what you say!',
                'audio' => 'storage/bisa-bikin-brand/chapter-43.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 44. Sedikit Cerita Tentang Personal Brand',
                'audio' => 'storage/bisa-bikin-brand/chapter-44.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 45. SBY - JK',
                'audio' => 'storage/bisa-bikin-brand/chapter-45.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_10 = $book->products()->create([
            'name' => 'Bundle 10',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_10->chapters()->createMany([
            [
                'title' => 'Chapter 46. BMS PLAN 2.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-46.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 47. MARKETING 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-47.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 48. CO-CREATION 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-48.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 49. CURRENCY 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-49.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 50. COMMUNAL ACTIVATION 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-50.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_11 = $book->products()->create([
            'name' => 'Bundle 11',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_11->chapters()->createMany([
            [
                'title' => 'Chapter 51. CONVERSATION 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-51.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 52. CO-CREATION INDONESIA',
                'audio' => 'storage/bisa-bikin-brand/chapter-52.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 53. SELLING 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-53.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 54. BRANDING 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-54.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 55. BSM PLAN 3.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-55.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_12 = $book->products()->create([
            'name' => 'Bundle 12',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_12->chapters()->createMany([
            [
                'title' => 'Chapter 56. MARKETING 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-56.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 57. Engagement 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-57.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 58. EXCITEMENT 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-58.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 59. EVERYWHERE 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-59.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 60. EVANGELIST 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-60.mp3',
                'book_id' => $book->id
            ],
        ]);



        $product_13 = $book->products()->create([
            'name' => 'Bundle 13',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_13->chapters()->createMany([
            [
                'title' => 'Chapter 61. BRAND ADVOCATE',
                'audio' => 'storage/bisa-bikin-brand/chapter-61.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 62. TRIBES 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-62.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 63. FROM STRANGERS TO PROMOTERS',
                'audio' => 'storage/bisa-bikin-brand/chapter-63.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 64. SHIFTING MARKETING 1.0 KE MARKETING 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-64.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 65. SELLING 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-65.mp3',
                'book_id' => $book->id
            ],
        ]);


        $product_14 = $book->products()->create([
            'name' => 'Bundle 14',
            'price' => 50000,
            'status' => 1,
        ]);

        $product_14->chapters()->createMany([
            [
                'title' => 'Siapa Subiakto Priosoedarsono',
                'audio' => 'storage/bisa-bikin-brand/siapa-subiakto-priosoedarsono.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 66. BRANDING 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-66.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 67. BMS PLAN 4.0',
                'audio' => 'storage/bisa-bikin-brand/chapter-67.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 68. BISNIS PLAN AND BRAND PLAN',
                'audio' => 'storage/bisa-bikin-brand/chapter-68.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 69. KONSUMEN ZAMAN NOW',
                'audio' => 'storage/bisa-bikin-brand/chapter-69.mp3',
                'book_id' => $book->id
            ],
            [
                'title' => 'Chapter 70. PERUBAHAN BISNIS ZAMAN NOW',
                'audio' => 'storage/bisa-bikin-brand/chapter-70.mp3',
                'book_id' => $book->id
            ],
        ]);
    }
}
