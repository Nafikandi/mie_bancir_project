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
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-borderless shadow-sm">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderMenu as $itemOrder)
                                            <tr>
                                                <td class="menu-disp">
                                                    <div class="imgMenu">
                                                        <img src="{{ url($itemOrder->Menu->photo) }}"
                                                            alt="imgMenuOrder">
                                                    </div>
                                                    <div class="nameMenu" style="vertical-align: middle">
                                                        <span>{{ $itemOrder->Menu->name_menu }}</span>
                                                        <br>
                                                        <small>
                                                            Jenis :
                                                            @if ($itemOrder->Menu->categories->name_category == 'MB')
                                                                Makanan Besar
                                                            @elseif ($itemOrder->Menu->categories->name_category == 'M')
                                                                Minuman
                                                            @elseif ($itemOrder->Menu->categories->name_category == 'MR')
                                                                Makanan Ringan
                                                            @endif
                                                        </small>
                                                    </div>
                                                </td>
                                                <td style="width: 1%" class="text-center">{{ $itemOrder->quantity }}
                                                </td>
                                                <td style="width: 20%">
                                                    Rp {{ number_format($itemOrder->Menu->price_menu) }}</td>
                                                <td style="width: 1%" class="text-center">
                                                    <a href="{{ route('hapuskeranjang', $itemOrder->code_order) }}"
                                                        class="text-primary">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Masukkan Kupon"
                                                aria-label="kupon" id="kupon">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    id="applyCoupon">Pakai</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="content-order border-bottom pb-2">
                                        <h5>Total Pesanan Anda</h5>
                                        <div class="subtotal d-flex justify-content-between">
                                            <span>SubTotal ({{ $countOrder }} Menu)</span>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @foreach ($orderMenu as $item)
                                                @php
                                                    $totalPrice += $item->Menu->price_menu * $item->quantity; // Menambahkan harga produk ke total
                                                @endphp
                                            @endforeach
                                            <div class="subtotal">Rp {{ number_format($totalPrice, 0) }}</div>
                                        </div>
                                        {{-- <div class="subtotal d-flex justify-content-between">
                                            <span class="text-diskon"></span>
                                            <div class="diskon"></div>
                                        </div> --}}
                                    </div>
                                    <div class="content-order border-bottom pb-2">
                                        <div class="total d-flex justify-content-between">
                                            <span> Total Harga</span>
                                            @php
                                                $totalPrice = 0;
                                                $diskon = 5000;
                                            @endphp
                                            @foreach ($orderMenu as $item)
                                                @php
                                                    $totalPrice += $item->Menu->price_menu * $item->quantity; // Menambahkan harga produk ke total
                                                @endphp
                                            @endforeach
                                            <div class="subtotal1">Rp {{ number_format($totalPrice, 0) }}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="status_discount d-flex justify-content-between">

                                    </div> --}}
                                    <div class="btn-pesan">
                                        <a href="{{ route('checkout') }}"
                                            class="btn btn-success btn-sm d-block">
                                            Checkout
                                        </a>
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

{{-- <script>
    $(document).ready(function() {
        // Harga awal
        array.forEach(element => {
            var hargaAwal = {{ $orderMenu->Menu->price_menu }};
        });

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
</script> --}}
{{-- midtrans --}}
{{-- <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}');
        // customer will be redirected after completing payment pop-up
    });
</script> --}}

{{-- <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container'
        });
    });
</script> --}}

{{-- kupon ajax --}}
{{-- <script>
    $(document).ready(function() {
        $('#applyCoupon').click(function() {
            var couponCode = $('#kupon').val();
            var csrfToken = '{{ csrf_token() }}'; // Ambil token CSRF
            $.ajax({
                type: 'POST',
                url: '{{ route('applyCoupon') }}',
                data: {
                    kupon: couponCode,
                    _token: csrfToken // Tambahkan token CSRF ke data
                },
                success: function(response) {
                    // Update bagian-bagian tertentu di halaman dengan hasil dari server
                    // $('.text-diskon').html('Diskon');
                    // $('.diskon').html('Rp. ' + response.potongan);
                    // $('.status_discount').html(response);
                    // var potongan = response.potongan;
                    // Menggunakan kondisional if-else untuk menentukan nilai diskon
                    if (typeof potongan !== 'undefined') {
                        // Jika potongan terdefinisi, gunakan nilainya
                        $('.text-diskon').html('Diskon');
                        $('.diskon').html('Rp. ' + potongan);
                        $('.status_discount').html('Anda Mendapatkan Diskon');
                    } else {
                        // Jika potongan undefined, atur nilai diskon ke 0
                        $('.diskon').hide();
                        $('.text-diskon').hide();
                        $('.status_discount').html('Kupon Tidak Valid!!');

                    }

                    // Memperbarui tampilan dengan nilai diskon
                    $('.subtotal1').html('Rp ' + ({{ $totalPrice }} - diskon)
                        .toLocaleString());
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script> --}}

</html>
