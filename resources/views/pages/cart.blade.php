@extends('layouts.app')

@section('title')
    Laelaekalam Store - Keranjang Belanja
@endsection

@section('content')

<div class="page-content page-cart">
    <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Keranjang Belanja
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <thead>
                            <tr class="text-center">
                                <td colspan="2" style="font-size: 19px">
                                    <strong>Produk</strong>
                                </td>
                                <td style="font-size: 19px">
                                    <strong>Harga</strong>
                                </td>
                                <td style="font-size: 19px">
                                    <strong>Menu</strong>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0
                            @endphp
                            @foreach ($carts as $cart)
                                <tr>
                                    <td
                                        class="text-center"
                                        style="width: 20%"
                                    >
                                        @if ($cart->product->galleries)
                                            <img
                                                src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                alt="Product Detail"
                                                class="cart-image"
                                            />
                                        @endif
                                    </td>
                                    <td style="width: 20%">
                                        <div class="product-title">
                                            {{ $cart->product->name }}
                                        </div>
                                        <div class="product-subtitle">
                                            oleh {{ $cart->product->user->store_name }}
                                        </div>
                                    </td>
                                    <td
                                        class="text-center"
                                        style="width: 30%"
                                    >
                                        <div class="product-title">
                                            Rp{{ number_format($cart->product->price) }},00
                                        </div>
                                        <div class="product-subtitle">
                                            IDR
                                        </div>
                                    </td>
                                    <td
                                        class="text-center"
                                        style="width: 20%"
                                    >
                                        <form action="{{ route('carts-delete', $cart->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button
                                                type="submit"
                                                class="btn btn-remove-cart"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $totalPrice += $cart->product->price
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12 mb-4">
                    <h2>Detail Pengiriman</h2>
                    <span class="text-muted mb-4">Detail disesuaikan dengan data akun anda, tetapi anda juga dapat menggantinya</span>
                </div>
            </div>
            <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                <div
                    class="row mb-2"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_one"
                                >Alamat 1 (Desa, Kecamatan/Kelurahan)</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="address_one"
                                name="address_one"
                                value="{{ Auth::user()->address_one }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_two"
                                >Alamat 2 (Jalan,
                                No.Rumah/Komplek/RT/RW)</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="address_two"
                                name="address_two"
                                value="{{ Auth::user()->address_two }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="provinces_id">Provinsi</label>
                            <select
                                name="provinces_id"
                                id="provinces_id"
                                class="form-control"
                                v-if="provinces"
                                v-model="provinces_id"
                            >
                                <option value="{{ Auth::user()->provinces_id }}" selected>Provinsi Sekarang ({{ Auth::user()->province->name }})</option>
                                <option v-for="province in provinces" :value="province.id">
                                    @{{ province.name }}
                                </option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regencies_id">Kota/Kabupaten</label>
                            <select
                                name="regencies_id"
                                id="regencies_id"
                                class="form-control"
                                v-if="regencies"
                                v-model="regencies_id"
                            >
                                <option value="{{ Auth::user()->regencies_id }}" selected>Kota/Kabupaten Sekarang ({{ Auth::user()->regency->name }})</option>
                                <option v-for="regency in regencies" :value="regency.id">
                                    @{{ regency.name }}
                                </option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Kode POS</label>
                            <input
                                type="number"
                                class="form-control"
                                id="zip_code"
                                name="zip_code"
                                value="{{ Auth::user()->zip_code }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Negara</label>
                            <input
                                type="text"
                                class="form-control"
                                id="country"
                                name="country"
                                value="{{ Auth::user()->country }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">No. HP (WhatsApp)</label>
                            <input
                                type="number"
                                class="form-control"
                                id="phone_number"
                                name="phone_number"
                                value="{{ Auth::user()->phone_number }}"
                            />
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-1">Informasi Pembayaran</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp0,00</div>
                        <div class="product-subtitle">Pajak Negara</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp0,00</div>
                        <div class="product-subtitle">Asuransi Produk</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title">Rp0,00</div>
                        <div class="product-subtitle">
                            Biaya Pengiriman
                        </div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">
                            Rp{{ number_format($totalPrice ?? 0) }},00
                        </div>
                        <div class="product-subtitle">Harga Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                        <button
                            type="submit"
                            class="btn btn-success mt-4 px-4 btn-block"
                        >
                            Checkout Sekarang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@push('addon-script')

    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id : null,
                regencies_id : null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function(response){
                            self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response){
                            self.regencies = response.data;
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        });
    </script>

@endpush