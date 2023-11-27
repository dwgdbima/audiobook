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
        Book::create([
            'title' => 'Bisa Bikin Brand',
            'author' => 'Subiakto Priosoedarsono',
            'desc' => '<p>Bukan sekedar buku, ini adalah Kitab panduan BISA BIKIN BRAND karangan Subiakto Priosoedarsono atau yang akrab disapa Pak Bi, seorang Praktisi Branding dengan pengalaman 54 tahun di dunia branding.</p>
                    <p>Pak Bi berhasil membranding brand-brand besar nasional seperti KOPIKO dengan taglinenya Gantinya Ngopi, Indomie Seleraku, Extra Jos, Kartu AS Telkomsel, Paspor BCA serta berhasil membangun personal brand dan mengantar Pak SBY-JK terpilih menjadi Presiden dan Wakil Presiden Indonesia lewat Pemilihan umum lansung, dan ratusan brand-brand nasional lainnya buah karya Pak Bi.</p>
                    <p>Kitab BISA BIKIN BRAND 1 membahas tuntas Branding Marketing dan Selling dari sudut pandang seorang Praktisi Brand dengan pengalaman 54 tahun di dunia Branding.</p>',
            'cover' => 'storage/bisabikinbrand.jpg'
        ]);
    }
}
