@extends('layouts.dashboard')

@section('title')
    Laelaekalam Store - Detail Transaksi
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">#{{ $transaction->transaction_codes }}</h2>
            <p class="dashboard-subtitle">
                Detail Transaksi
            </p>
        </div>
        <div
            class="dashboard-content"
            id="transactionDetails"
        >
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div
                                    class="col-12 col-md-4"
                                >
                                    <img
                                        src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                        class="w-100 mb-3"
                                        alt="Product Photo"
                                    />
                                </div>
                                <div
                                    class="col-12 col-md-8"
                                >
                                    <div class="row">
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                Nama Pembeli
                                            </div>
                                            <div
                                                class="product-subtitle"
                                            >
                                                {{ $transaction->transaction->user->name }}
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                Nama Produk
                                            </div>
                                            <div
                                                class="product-subtitle"
                                            >
                                                {{ $transaction->product->name }}
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                Tanggal
                                                Transaksi
                                            </div>
                                            <div
                                                class="product-subtitle"
                                            >
                                                {{ $transaction->created_at }}
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                Payment Status
                                            </div>
                                            <div
                                                class="product-subtitle text-danger"
                                            >
                                                {{ $transaction->transaction->transaction_status }}
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                Harga Total
                                            </div>
                                            <div
                                                class="product-subtitle"
                                            >
                                                Rp{{ number_format($transaction->transaction->total_price) }},00
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-6"
                                        >
                                            <div
                                                class="product-title"
                                            >
                                                No. HP
                                                (WhatsApp)
                                            </div>
                                            <div
                                                class="product-subtitle"
                                            >
                                                {{ $transaction->transaction->user->phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('dashboard-transactions-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <h3>
                                            Shipping Information
                                        </h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Alamat 1
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->transaction->user->address_one }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Alamat 2
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->transaction->user->address_one }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Provinsi
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Kota/Kabupaten
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Kode POS
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->transaction->user->zip_code }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Negara
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->transaction->user->country }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Status Transaksi
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->shipping_status }}
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-md-6"
                                            >
                                                <div
                                                    class="product-title"
                                                >
                                                    Resi
                                                </div>
                                                <div
                                                    class="product-subtitle"
                                                >
                                                    {{ $transaction->resi }}
                                                </div>
                                            </div>
                                            @if(Auth::user()->id == $transaction->product->users_id)
                                                <div
                                                    class="col-12 col-md-3"
                                                >
                                                    <div
                                                        class="product-title"
                                                    >
                                                        Status Transaksi
                                                    </div>
                                                    <select
                                                        name="shipping_status"
                                                        id="status"
                                                        class="form-control"
                                                        v-model="status"
                                                    >
                                                        <option
                                                            value="PENDING"
                                                        >
                                                            Pending
                                                        </option>
                                                        <option
                                                            value="SHIPPING"
                                                        >
                                                            Shipping
                                                        </option>
                                                        <option
                                                            value="SUCCESS"
                                                        >
                                                            Success
                                                        </option>
                                                    </select>
                                                </div>
                                                <template
                                                    v-if="status == 'SHIPPING'"
                                                >
                                                    <div
                                                        class="col-md-3"
                                                    >
                                                        <div
                                                            class="product-title"
                                                        >
                                                            Resi
                                                        </div>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="resi"
                                                            v-model="resi"
                                                        />
                                                    </div>
                                                    <div
                                                        class="col-md-2"
                                                    >
                                                        <button
                                                            type="submit"
                                                            class="btn btn-success btn-block mt-4"
                                                        >
                                                            Update
                                                            Resi
                                                        </button>
                                                    </div>
                                                </template>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if(Auth::user()->id == $transaction->product->users_id)
                                <div class="row mt-4">
                                    <div
                                        class="col-12 text-right"
                                    >
                                        <button
                                            type="submit"
                                            class="btn btn-success btn-lg mt-4"
                                        >
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')

<script src="/vendor/vue/vue.js"></script>
<script>
    var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
            status: "{{ $transaction->shipping_status }}",
            resi: "{{ $transaction->resi }}",
        },
    });
</script>

@endpush