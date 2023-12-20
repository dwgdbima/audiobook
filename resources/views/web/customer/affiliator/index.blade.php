@extends('web.customer.layout.main')
@push('styles')
<style>
    th{
        color:#747794;
    }

    .pagination{
        justify-content: center;
        --bs-pagination-font-size: 14px;
        --bs-pagination-border-width: 0;
        --bs-pagination-active-color: #6d757d;
        --bs-pagination-active-bg: unset;
    }
</style>
@endpush
@section('content')
<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <!-- Single Vendor -->
                <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                    style="background-color: #ea4c62;">
                    <h5 class="vendor-title text-white">Saldo Saat Ini</h5>
                    <div class="vendor-info">
                        <h1 class="mb-1 text-white">@money($balance, 'IDR', true)</h1>
                    </div>
                    <a class="btn btn-warning btn-sm mt-3" href="https://ipaymu.com" target="_blank">Pergi ke Ipaymu<i
                            class="fa-solid fa-arrow-right-long ms-1"></i></a>
                    <!-- Vendor Profile-->
                    <div class="vendor-profile" style="background-color:unset;">
                        <figure class="m-0"><img style="max-width: 4.5rem;" src="{{asset('dist/img/core-img/logo-ipaymu.png')}}" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label>Link Referral</label>
                        <div class="input-group mb-3 copy-link">
                            <input type="text" class="form-control copy-link-input" id="referral_link" name="referral_link"
                                value="{{ $referral_link }}" readonly>
                            <button class="input-group-text copy-link-button" id="basic-addon2">copy</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="flex">
                            <span class="me-2">Share ke: </span>
                            <a href="https://wa.me/?text={{urlencode("Ayo daftar di aplikasi audiobook subiakto!\nNikmati bagaimana rasanya saat dibacakan langsung oleh penulisnya.\nBerikut link pendaftarannya\n" . $referral_link)}}" target="_blank" class="btn" style="background-color: #25D366; color: #fff"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{$referral_link}}&display=popup" target="_blank" class="btn" style="background-color: #4267B2; color: #fff"><i class="fa-brands fa-facebook"></i> Facebook</a>
                            <a href="http://twitter.com/share?text={{urlencode("Ayo daftar di aplikasi audiobook subiakto!")}}&url={{urlencode($referral_link)}}" target="_blank" class="btn" style="background-color: #1DA1F2; color: #fff"><i class="fa-brands fa-twitter"></i> Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <strong>Jumlah Transaksi: </strong>{{$transactions->total()}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <strong>Jumlah Affiliasi: </strong>{{$affiliates->count()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <span class="mt-4"><strong>List Transaksi</strong></span>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-end">Jumlah</th>
                                </tr>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->order->user->name}}</td>
                                    <td class="text-center">{{$transaction->created_at}}</td>
                                    <th class="text-end text-success">@money($transaction->amount, 'IDR', true)</th>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center"><i>Belum ada transaksi</i></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        {{$transactions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.querySelectorAll(".copy-link").forEach((copyLinkParent) => {
        const inputField = copyLinkParent.querySelector(".copy-link-input");
        const copyButton = copyLinkParent.querySelector(".copy-link-button");
        const text = inputField.value;

        inputField.addEventListener("focus", () => inputField.select());

        copyButton.addEventListener("click", () => {
            inputField.select();
            navigator.clipboard.writeText(text);

            inputField.value = "Copied!";
            setTimeout(() => (inputField.value = text), 2000);
        });
    });

</script>
@endpush