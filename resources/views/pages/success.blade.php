@extends('layouts.success')

@section('title')
    Laelaekalam Store - Transaksi Sukses
@endsection

@section('content')

<div class="page-content page-success">
    <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div
                class="row align-items-center row-login justify-content-center"
            >
                <div class="col-lg-6 text-center">
                    <img
                        src="/images/success.svg"
                        alt="Success"
                        class="mb-4"
                    />
                    <h2>Transaksi Sukses!</h2>
                    <p>
                        Silahkan tunggu konfirmasi email dari kami dan
                        kami akan menginformasikan resi secepat mungkin
                    </p>
                    <div>
                        <a
                            href="/dashboard.html"
                            class="btn btn-success w-50 mt-4"
                            >Dashboard Saya</a
                        >
                        <a
                            href="{{ route('home') }}"
                            class="btn btn-signup w-50 mt-2"
                            >Kembali Belanja</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection