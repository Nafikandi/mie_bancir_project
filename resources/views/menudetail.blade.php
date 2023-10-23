<!DOCTYPE html>
<html>

<head>
    @include('include.style')
</head>

<body>

    {{-- header --}}
    <x-navbaruser></x-navbaruser>
    {{-- endheader --}}

    <!-- promo section -->

    <section class="detail_menu_section layout_padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Menu</a></li>
                        <li class="breadcrumb-item"><a href="#">
                                @if ($menu->category_menu == 1)
                                    Makanan
                                @elseif($menu->category_menu == 2)
                                    Minuman
                                @elseif($menu->category_menu == 3)
                                    Cemilan
                                @endif
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $menu->name_menu }}</li>
                    </ol>

                    <div class="widget-menu">
                        <div class="image-menu">
                            <img src="{{ url($menu->photo) }}" alt="" class="shadow-sm">
                        </div>
                        <div class="content-menu">
                            <div class="text-name">
                                <span>{{ $menu->name_menu }}</span>
                            </div>
                            <div class="rating">
                                <span>terjual 50 porsi |</span>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                                |
                                <span class="badge badge-primary badge-sm">menu terfavorit</span>
                            </div>
                            <div class="price-menu">
                                <h4>Rp {{ number_format($menu->price_menu, 0) }}</h4>
                            </div>
                            <div class="decripted-menu">
                                <span>Deskripsi Menu</span>
                                <p>
                                    {{ strip_tags(html_entity_decode($menu->description_menu)) }}
                                </p>
                            </div>
                        </div>
                        <div class="card-buy">
                            <div class="card">
                                <div class="card-body">
                                    <span>Mau Pesan Menu?</span>
                                    <div class="number">
                                        <span class="minus" id="minus">-</span>
                                        <input type="text" value="1" id="quantity" />
                                        <span class="plus" id="plus">+</span>
                                    </div>
                                    <div class="catatan">
                                        <div class="text">
                                            <i class="fa fa-pencil"></i>
                                            Catatan
                                        </div>
                                        <input type="text" name="catatan" id="catatan"
                                            placeholder="berikan catatan untuk pesanan">
                                    </div>
                                    <div class="subtotal">
                                        <div class="text-subtotal">
                                            <span>Subtotal</span>
                                        </div>
                                        <div class="fix-price">
                                            <span id="total">Rp. {{ $menu->price_menu }}</span>
                                        </div>
                                    </div>
                                    <div class="beli-menu mt-2">
                                        <a href="" class="btn btn-success btn-sm d-block p-2">Masukan
                                            Keranjang</a>
                                        <a href="" class="btn btn-primary btn-sm d-block mt-1 p-2">Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->


    <!-- footer section -->
    <x-footeruser></x-footeruser>
    <!-- footer section -->

    {{-- script --}}
    @include('include.main')

</body>

<script>
    $(document).ready(function() {
        // Harga awal
        var hargaAwal = {{ $menu->price_menu }};

        // Memantau perubahan pada elemen input
        $('#quantity').change(function() {
            var quantity = parseInt($(this).val()) || 1; // Jika nilai input tidak valid, gunakan 1
            var totalPrice = hargaAwal * quantity;

            // Menampilkan harga total dalam elemen dengan ID "totalPrice"
            $('#total').text('Rp. ' + totalPrice);
        });

        // Mengurangi jumlah saat tombol "minus" diklik
        $('#minus').click(function() {
            var quantity = parseInt($('#quantity').val()) || 1;
            quantity = Math.max(quantity - 1, 1);
            $('#quantity').val(quantity).change(); // Memanggil perubahan input
        });

        // Menambah jumlah saat tombol "plus" diklik
        $('#plus').click(function() {
            var quantity = parseInt($('#quantity').val()) || 1;
            quantity = quantity + 1;
            $('#quantity').val(quantity).change(); // Memanggil perubahan input
        });
    });
</script>

</html>
