@extends('layouts.dashboard')

@section('title')
    Laelaekalam Store - Daftar Transaksi
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">
                Hasil yang besar dimulai dari usaha yang
                kecil
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <ul
                        class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist"
                    >
                        <li
                            class="nav-item"
                            role="presentation"
                        >
                            <a
                                class="nav-link active"
                                id="pills-jual-tab"
                                data-toggle="pill"
                                href="#pills-jual"
                                role="tab"
                                aria-controls="pills-jual"
                                aria-selected="true"
                            >
                                Produk Yang Dijual
                            </a>
                        </li>
                        <li
                            class="nav-item"
                            role="presentation"
                        >
                            <a
                                class="nav-link"
                                id="pills-beli-tab"
                                data-toggle="pill"
                                href="#pills-beli"
                                role="tab"
                                aria-controls="pills-beli"
                                aria-selected="false"
                            >
                                Produk Yang Dibeli
                            </a>
                        </li>
                    </ul>
                    <div
                        class="tab-content"
                        id="pills-tabContent"
                    >
                        <div
                            class="tab-pane fade show active"
                            id="pills-jual"
                            role="tabpanel"
                            aria-labelledby="pills-jual-tab"
                        >
                            @foreach ($sellTransactions as $transaction)
                                <a
                                    href="{{ route('dashboard-transactions-details', $transaction->id) }}"
                                    class="card card-list d-block"
                                >
                                    <div class="card-body">
                                        <div class="row">
                                            <div
                                                class="col-md-1"
                                            >
                                                <img
                                                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                                    alt="Product Icon"
                                                    class="w-50"
                                                />
                                            </div>
                                            <div
                                                class="col-md-4"
                                            >
                                                {{ $transaction->product->name }}
                                            </div>
                                            <div
                                                class="col-md-3"
                                            >
                                                {{ $transaction->product->user->store_name }}
                                            </div>
                                            <div
                                                class="col-md-3"
                                            >
                                                {{ $transaction->created_at }}
                                            </div>
                                            <div
                                                class="col-md-1 d-none d-md-block"
                                            >
                                                <img
                                                    src="/images/dashboard-arrow-right.svg"
                                                    alt="Arrow Right"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pills-beli"
                            role="tabpanel"
                            aria-labelledby="pills-beli-tab"
                        >
                            @foreach ($buyTransactions as $transaction)
                                <a
                                    href="{{ route('dashboard-transactions-details', $transaction->id) }}"
                                    class="card card-list d-block"
                                >
                                    <div class="card-body">
                                        <div class="row">
                                            <div
                                                class="col-md-1"
                                            >
                                                <img
                                                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                                    alt="Product Icon"
                                                    class="w-50"
                                                />
                                            </div>
                                            <div
                                                class="col-md-4"
                                            >
                                                {{ $transaction->product->name }}
                                            </div>
                                            <div
                                                class="col-md-3"
                                            >
                                                {{ $transaction->product->user->store_name }}
                                            </div>
                                            <div
                                                class="col-md-3"
                                            >
                                                {{ $transaction->created_at }}
                                            </div>
                                            <div
                                                class="col-md-1 d-none d-md-block"
                                            >
                                                <img
                                                    src="/images/dashboard-arrow-right.svg"
                                                    alt="Arrow Right"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection