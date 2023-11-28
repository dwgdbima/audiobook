@extends('web.customer.layout.main')

@section('content')
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2"><a href="/setting"><i class="fa-solid fa-arrow-left-long"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Privacy Policy</h6>
      </div>
      <!-- Navbar Toggler-->
      <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
        <div><span></span><span></span><span></span></div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
    <!-- Close button-->
    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <!-- Offcanvas body-->
    <div class="offcanvas-body">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
        <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
        <div class="user-info">
          <h5 class="user-name mb-1 text-white">Suha Sarah</h5>
          <p class="available-balance text-white">Available points <span class="counter">499</span></p>
        </div>
      </div>
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <li><a href="profile.html"><i class="fa-solid fa-user"></i>My Profile</a></li>
        <li><a href="notifications.html"><i class="fa-solid fa-bell lni-tada-effect"></i>Notifications<span class="ms-1 badge badge-warning">3</span></a></li>
        <li class="suha-dropdown-menu"><a href="#"><i class="fa-solid fa-store"></i>Shop Pages</a>
          <ul>
            <li><a href="shop-grid.html">Shop Grid</a></li>
            <li><a href="shop-list.html">Shop List</a></li>
            <li><a href="single-product.html">Product Details</a></li>
            <li><a href="featured-products.html">Featured Products</a></li>
            <li><a href="flash-sale.html">Flash Sale</a></li>
          </ul>
        </li>
        <li><a href="pages.html"><i class="fa-solid fa-file-code"></i>All Pages</a></li>
        <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="fa-solid fa-heart"></i>My Wishlist</a>
          <ul>
            <li><a href="wishlist-grid.html">Wishlist Grid</a></li>
            <li><a href="wishlist-list.html">Wishlist List</a></li>
          </ul>
        </li>
        <li><a href="settings.html"><i class="fa-solid fa-sliders"></i>Settings</a></li>
        <li><a href="intro.html"><i class="fa-solid fa-toggle-off"></i>Sign Out</a></li>
      </ul>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="container">
      <!-- Privacy Policy-->
      <div class="privacy-policy-wrapper py-3">
        <h6>Kebijakan Privasi</h6>
        <p>Dengan menggunakan atau mengakses layanan dengan cara apa pun, Anda mengakui bahwa Anda menerima praktik dan kebijakan yang diuraikan dalam Kebijakan Privasi ini, dan dengan ini Anda memberikan persetujuan bahwa kami akan mengumpulkan, menggunakan, dan membagikan informasi Anda dengan cara berikut.</p>
        <h6>Apa Data yang Kami Kumpulkan dan Mengapa Kami Mengumpulkannya</h6>
        <p>Seperti kebanyakan situs web lainnya, kami mengumpulkan beberapa informasi (seperti penyedia seluler, sistem operasi, dll.) secara otomatis dan menyimpannya dalam file log. Kami menggunakan informasi ini, yang tidak mengidentifikasi pengguna individual, untuk menganalisis tren, mengelola situs web, melacak pergerakan pengguna di sekitar situs web, dan mengumpulkan informasi demografis tentang basis pengguna kami secara keseluruhan. Kami mungkin mengaitkan beberapa data yang dikumpulkan secara otomatis ini dengan beberapa Informasi Identitas Pribadi tertentu.</p>
        <h6>Informasi Identitas Pribadi</h6>
        <p>Jika Anda adalah Klien, ketika Anda mendaftar bersama kami melalui situs web kami, kami akan meminta informasi identitas pribadi tertentu, seperti nama depan dan belakang Anda, nama perusahaan, alamat email, alamat tagihan, dan informasi kartu kredit. Anda dapat meninjau dan memperbarui informasi identitas pribadi ini di profil Anda dengan masuk dan mengedit informasi tersebut di dasbor Anda. Jika Anda memutuskan untuk menghapus semua informasi Anda, kami dapat membatalkan akun Anda. Kami mungkin menyimpan salinan arsip dari catatan Anda sebagaimana yang diwajibkan oleh hukum atau untuk tujuan bisnis yang wajar.</p>
        <p>Karena sifat Layanan, kecuali untuk membantu Klien dengan beberapa masalah teknis terbatas atau jika diperlukan secara hukum, kami tidak akan mengakses Konten apa pun yang Anda unggah ke Layanan.</p>
        <p>Beberapa Informasi Identitas Pribadi juga dapat diberikan kepada perantara dan pihak ketiga yang membantu kami dengan Layanan, tetapi yang mungkin tidak menggunakan informasi tersebut selain untuk membantu kami dalam menyediakan Layanan. Kecuali seperti yang disediakan lain dalam Kebijakan Privasi ini, kami tidak akan menyewakan atau menjual Informasi Identitas Pribadi Anda kepada pihak ketiga.</p>
        <h6>Penggunaan Informasi</h6>
        <p>Untuk Klien kami, kami menggunakan informasi pribadi terutama untuk menyediakan Layanan dan menghubungi Klien kami mengenai kegiatan akun, versi baru, dan penawaran produk, atau komunikasi lain yang relevan dengan Layanan. Kami tidak menjual atau membagikan informasi identitas pribadi atau informasi lainnya dari Pengguna Akhir kepada pihak ketiga, kecuali tentu saja kepada Klien yang berlaku untuk situs web yang Anda gunakan.</p>
        <p>Jika Anda menghubungi kami melalui email atau melalui pengisian formulir pendaftaran, kami dapat menyimpan catatan informasi kontak dan korespondensi Anda dan dapat menggunakan alamat email Anda, serta informasi yang Anda berikan kepada kami dalam pesan Anda, untuk menanggapi Anda. Selain itu, kami dapat menggunakan informasi pribadi yang dijelaskan di atas untuk mengirimkan informasi kepada Anda mengenai Layanan. Jika Anda memutuskan kapan saja bahwa Anda tidak ingin lagi menerima informasi atau komunikasi semacam itu dari kami, kirimkan email kepada kami di [alamat email] dan mintalah untuk dihapus dari daftar kami. Keadaan di bawah mana kami dapat membagikan informasi tersebut dengan pihak ketiga dijelaskan di bawah dalam "Mematuhi Proses Hukum".</p>
        <h6>Penyimpanan dan Keamanan Informasi</h6>
        <p class="mb-0">Kami mengoperasikan jaringan data yang aman yang dilindungi oleh firewall standar industri dan sistem perlindungan kata sandi. Kebijakan keamanan dan privasi kami secara berkala ditinjau dan diperbarui sebagaimana diperlukan, dan hanya individu yang diotorisasi memiliki akses ke informasi yang diberikan oleh Klien kami.</p>
    </div>
    
    </div>
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Footer Nav-->
  
@endsection