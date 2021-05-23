@extends('layouts.admin')

@section('title')
    Laelaekalam Store - Dashboard Admin
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard Admin</h2>
            <p class="dashboard-subtitle">
                Selamat datang di Dashboard Administrator Laelaekalam Store!
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div
                                class="dashboard-card-title"
                            >
                                Pelanggan
                            </div>
                            <div
                                class="dashboard-card-subtitle"
                            >
                                {{ $customer }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div
                                class="dashboard-card-title"
                            >
                                Pemasukan
                            </div>
                            <div
                                class="dashboard-card-subtitle"
                            >
                                Rp{{ $revenue }},00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div
                                class="dashboard-card-title"
                            >
                                Transaksi
                            </div>
                            <div
                                class="dashboard-card-subtitle"
                            >
                                {{ $transaction }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection