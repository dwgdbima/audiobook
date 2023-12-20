@extends('web.customer.layout.main')
@push('styles')

@endpush
@section('content')
<div class="page-content-wrapper">
    <div class="container">
        <div class="join-affiliator py-3">
            <div class="card mb-3">
                <div class="card-body">
                    <p><strong class="d-block">Bergabunglah Menjadi Affiliator Dalam Sekejap Mata!</strong></p>
                    <p>Hai Sobat,</p>
                    <p>Ingin penghasilan tambahan tanpa ribet? Bergabunglah sebagai affiliator kami sekarang!</p>
                    <p><strong>Mengapa Bergabung Sebagai Affiliator Kami?</strong></p>
                    <ol style="margin-bottom: 1rem">
                        <li><strong>Pendapatan Mudah:</strong> Dapatkan komisi sebesar <strong>10%</strong> setiap kali seseorang yang terafiliasi dengan anda membeli produk. Tanpa repot mengurus inventaris atau pengiriman, cukup promosikan dan dapatkan hasilnya.</li>
                        <li><strong>Tautan Khusus untuk Anda:</strong> Setelah bergabung, Anda akan memiliki tautan unik yang bisa Anda bagikan di media sosial atau di mana pun Anda mau. Setiap user yang terdaftar melalui tautan anda dan user itu membeli produk, anda akan mendapatkan komisi sebesar <strong>10%</strong></li>
                        <li><strong>Tanpa Biaya Bergabung:</strong> Gabunglah tanpa biaya atau biaya tersembunyi. Ini adalah kesempatan bebas risiko untuk memulai menghasilkan uang secara online.</li>
                        <li><strong>Fleksibilitas Waktu:</strong> Jadi affiliator sesuai dengan waktu luang Anda. Tanpa batasan waktu atau kewajiban, Anda bisa menjadwalkan promosi sesuai dengan kenyamanan Anda.</li>
                    </ol>
                    <p><strong>Langkah Mudah untuk Bergabung:</strong></p>
                    <ol style="margin-bottom: 1rem">
                        <li><strong>Masukan Password:</strong> Masukan password anda untuk memverifikasi bahwa ini benar akun anda.</li>
                        <li><strong>Klik Tombol Gabung:</strong> Setelah memasukan password, klik tombol gabung untuk mulai menjadi bagian dari kami.</li>
                        <li><strong>Mulai Bagikan Tautan Anda:</strong> Bagikan tautan Anda di media sosial, blog, atau kepada teman-teman. Setiap penjualan melalui tautan Anda akan menghasilkan komisi untuk Anda.</li>
                        <li><strong>Withdraw:</strong> Setelah bergabung anda akan otomatis terdaftar di <a href="https://ipaymu.com">ipaymu</a>. Login menggunakan email, password yang terdaftar disini dan lakukan verifikasi untuk melakukan withdraw.</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('customer.join-affiliator.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label id="password"><strong>Masukan password</strong></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="password sekarang" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Gabung sekarang!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush