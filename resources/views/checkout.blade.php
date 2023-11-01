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
                    <div class="title-header">
                        <h5>Pesan Menu</h5>
                    </div>
                    <div class="row checkout">
                        <div class="col-md-8">
                            <span class="alamat">Alamat Pengiriman</span>
                            <br>
                            <strong>{{ $userid->name }}</strong>
                            <div class="hp">
                                @if ($userid->number_phone == null)
                                    Nomor HP belum ditambahkan
                                @else
                                    {{ $userid->number_phone }}
                                @endif
                            </div>
                            <p>
                                @if ($userid->address == null)
                                    Alamat belum ditambahkan

                                    <!-- Button trigger modal -->
                                    <br>
                                    <button type="button" class="btn btn-primary btn-sm mt-2" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@fat">Update data</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('updateData') }}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="number_phone" class="col-form-label">Nomor
                                                                HP</label>
                                                            <input type="text" class="form-control" id="number_phone"
                                                                name="number_phone" placeholder="Masukan nomor Hp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text"
                                                                class="col-form-label">Alamat</label>
                                                            <textarea class="form-control" id="message-text" name="address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    {{ $userid->address }}
                                @endif
                            </p>
                            <div class="table-responsive">
                                <table class="table table-borderless shadow-sm">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            @foreach ($orderMenu as $itemOrder)
                                                <td class="menu-disp checkout-menu">
                                                    <div class="imgMenu">
                                                        <img src="{{ url($itemOrder->Menu->photo) }}"
                                                            alt="imgMenuOrder">
                                                    </div>
                                                    <div class="nameMenu" style="vertical-align: middle">
                                                        <span>{{ $itemOrder->Menu->name_menu }}</span>
                                                        <br>
                                                        <span class="quantity">{{ $itemOrder->quantity }} Bungkus</span>
                                                        <br>
                                                        <span class="price">Rp{{ $itemOrder->Menu->price_menu }}</span>
                                                    </div>
                                                </td>
                                            @endforeach
                                            <td class="kurir">
                                                <select name="kurir" id="kurir">
                                                    <option disabled selected>-- Pengiriman --</option>
                                                    <option value="kurir">Kurir</option>
                                                    {{-- <option value="Grab">Grab</option> --}}
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="form-group kupon">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Masukkan Kupon"
                                                aria-label="kupon" id="kupon" value="">
                                            <div class="input-group-append">
                                                <button type="button" class="kupon btn btn-sm btn-primary"
                                                    id="applyCoupon">Pakai</button>
                                            </div>
                                        </div>
                                    </div>
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
                                        <div class="subtotal d-flex justify-content-between">
                                            <span class="text-diskon"></span>
                                            <div class="diskon" id="diskon"></div>
                                        </div>
                                        <div class="subtotal d-flex justify-content-between">
                                            <span class="text-kurir"></span>
                                            <div class="hrgakurir"></div>
                                        </div>
                                    </div>
                                    <div class="content-order border-bottom pb-2">
                                        <div class="total d-flex justify-content-between">
                                            <span> Total Bayar</span>
                                            @php
                                                $totalPrice = 0;
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
                                    <div class="status_discount d-flex justify-content-between">

                                    </div>
                                    <div class="btn-pesan">
                                        {{-- <input type="hidden" name="thrga" value="{{ $totalPrice }}"
                                                id="thrga"> --}}
                                        {{-- <input type="hidden" name="transid" value="{{ $transIDrand }}"
                                            id="transid">
                                        <input type="hidden" name="ikurir" value="ikurir" id="ikurir">
                                        <input type="hidden" name="harga" value="{{ $totalPrice }}"
                                            id="harga">
                                        <input type="hidden" name="itharga" value="itharga" id="itharga">
                                        <input type="hidden" name="status_transaction" value="MENUNGGU"
                                            id="status_transaction">
                                        <input type="hidden" name="payment" value="BCA" id="payment">

                                        @foreach ($orderMenu as $omID)
                                            <input type="hidden" name="orderid[]" value="{{ $omID->code_order }}"
                                                id="orderid">
                                        @endforeach --}}
                                        <button type="submit" id="bayar"
                                            class="btn btn-success btn-sm btn-block">
                                            Bayar
                                        </button>
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

{{-- kurir --}}
<script>
    $(document).ready(function() {
        var hargaKurir = 10000;
        $('#kurir').on('change', function() {
            var kurirSelect = document.getElementById('kurir');
            var totalPrice = {{ $totalPrice }};
            var hargaKurir = 10000;
            var inputKurir = $('#ikurir');
            var inputTHarga = $('#itharga');
            if (kurirSelect.value === 'kurir') {
                var total = totalPrice + hargaKurir;
                $('.text-kurir').html('Kurir');
                $('.hrgakurir').html('Rp. ' + hargaKurir);
                $('.kurir').html('Kurir = ' + 'Rp. ' + hargaKurir);
                $('.subtotal1').html('Rp ' + total.toLocaleString());

                inputKurir.val('kurir');
                inputTHarga.val(total);
            }
        });
    });
</script>


{{-- kupon ajax --}}
<script>
    $(document).ready(function() {
        $('#applyCoupon').click(function() {
            var couponCode = $('#kupon').val();
            var csrfToken = '{{ csrf_token() }}'; // Ambil token CSRF
            var totalPrice = {{ $totalPrice }};
            var potongan = 0; // Anda dapat mengganti nilai potongan dengan nilai yang sesuai
            var hargaKurir = 10000; // Anda dapat mengganti nilai potongan dengan nilai yang sesuai
            $.ajax({
                type: 'POST',
                url: '{{ route('applyCoupon') }}',
                data: {
                    kupon: couponCode,
                    _token: csrfToken // Tambahkan token CSRF ke data
                },
                success: function(response) {
                    var potongan = response.potongan;
                    // Menggunakan kondisional if-else untuk menentukan nilai diskon
                    if (typeof potongan !== 'undefined') {
                        // Jika potongan terdefinisi, gunakan nilainya
                        $('.text-diskon').html('Diskon');
                        $('.diskon').html('Rp. ' + potongan);
                        $('.text-kurir').html('Kurir');
                        $('.hrgakurir').html('Rp. ' + hargaKurir);

                        $('.diskon').show();
                        $('.text-diskon').show();
                        $('.text-kurir').show();
                        $('.hrgakurir').show();
                        $('.status_discount').html('Anda Mendapatkan Diskon');
                    } else {
                        // Jika potongan undefined, atur nilai diskon ke 0
                        $('.diskon').hide();
                        $('.text-diskon').hide();
                        $('.text-kurir').hide();
                        $('.hrgakurir').hide();
                        $('.status_discount').html('Kupon Tidak Valid!!');

                    }

                    if (!isNaN(potongan)) {
                        // Jika potongan dan hargaKurir adalah angka yang valid, hitung total
                        var total = totalPrice - potongan + hargaKurir;
                        // Tampilkan total dengan format yang sesuai
                        $('.subtotal1').html('Rp ' + total.toLocaleString());

                        var kurirSelect = $('#kurir');
                        if (kurirSelect.val() !== 'kurir') {
                            $('.kurir').html('Kurir = ' + 'Rp. ' + hargaKurir);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#kurir').change(function() {
            var selectedKurir = $(this).val();

            if (selectedKurir !== "Kurir") {
                $('#bayar').prop('disabled', false);
                // Tangani klik pada tombol "Bayar"
                $('#bayar').click(function() {
                    // Buat objek data yang akan dikirimkan ke server
                    var csrfToken = '{{ csrf_token() }}';

                    var diskonText = $('#diskon').text().trim();
                    var diskonValue = 0;
                    var totalPrice = {{ $totalPrice }};
                    var hargaKurir = 10000;
                    // jika tidak ada diskon

                    if (diskonText === '') {
                        // var total = totalPrice + hargaKurir - diskonValue;
                        var data = {
                            transid: "{{ $transIDrand }}",
                            ikurir: "K",
                            harga: "{{ $totalPrice }}",
                            hKurir: hargaKurir,
                            cDiskon: diskonValue,
                            status_transaction: "M",
                            payment: "BCA",
                            _token: csrfToken
                        };
                        var orderid = [];
                        @foreach ($orderMenu as $omID)
                            orderid.push("{{ $omID->code_order }}");
                        @endforeach
                        data.orderid = orderid;
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('transaksi') }}',
                            data: data,

                            success: function(response) {
                                // console.log(response);
                                // For example trigger on button clicked, or any time you need
                                var snapToken = response.snapToken;
                                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                                window.snap.pay(snapToken, {
                                    onSuccess: function(result) {
                                        /* You may add your own implementation here */
                                        alert("payment success!");
                                        console.log(result);
                                    },
                                    onPending: function(result) {
                                        /* You may add your own implementation here */
                                        alert("wating your payment!");
                                        console.log(result);
                                    },
                                    onError: function(result) {
                                        /* You may add your own implementation here */
                                        alert("payment failed!");
                                        console.log(result);
                                    },
                                    onClose: function() {
                                        /* You may add your own implementation here */
                                        alert('you closed the popup without finishing the payment');
                                    }
                            });
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    } else {
                        // data masih kurang tepat karena mesti 2x klik baru ada terbaca diskonnya
                        var diskonValue = parseFloat(diskonText.replace('Rp.', '').replace(/\s/g, ''));
                        var data = {
                            transid: "{{ $transIDrand }}",
                            ikurir: "K",
                            harga: "{{ $totalPrice }}",
                            hKurir: hargaKurir,
                            cDiskon: diskonValue,
                            status_transaction: "M",
                            payment: "BCA",
                            _token: csrfToken
                        };
                        var orderid = [];
                        @foreach ($orderMenu as $omID)
                            orderid.push("{{ $omID->code_order }}");
                        @endforeach
                        data.orderid = orderid;
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('transaksi') }}',
                            data: data,

                            success: function(response) {
                                var snapToken = response.snapToken;
                                window.snap.pay(snapToken, {
                                    onSuccess: function(result) {
                                        /* You may add your own implementation here */
                                        alert("payment success!");
                                        console.log(result);
                                    },
                                    onPending: function(result) {
                                        /* You may add your own implementation here */
                                        alert("wating your payment!");
                                        console.log(result);
                                    },
                                    onError: function(result) {
                                        /* You may add your own implementation here */
                                        alert("payment failed!");
                                        console.log(result);
                                    },
                                    onClose: function() {
                                        /* You may add your own implementation here */
                                        alert('you closed the popup without finishing the payment');
                                    }
                                });
                                },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            } else {
                $('#beli').prop('disabled', true);
            }
        });
        // $('#applyCoupon').click(function() {
        //     $('#bayar').prop('disabled', false);
        //     // Tangani klik pada tombol "Bayar"
        //     $('#bayar').click(function() {
        //         // Buat objek data yang akan dikirimkan ke server
        //         var csrfToken = '{{ csrf_token() }}';

        //         var diskonText = $('#diskon').text().trim();
        //         var diskonValue = 0;
        //         var totalPrice = {{ $totalPrice }};
        //         var hargaKurir = 10000;
        //         // jika tidak ada diskon

        //         if (diskonText !== '') {
        //             var diskonValue = parseFloat(diskonText.replace('Rp.', '').trim());
        //             var total = totalPrice + hargaKurir - diskonValue;
        //             var data = {
        //                 transid: "{{ $transIDrand }}",
        //                 ikurir: "kurir",
        //                 harga: "{{ $totalPrice }}",
        //                 itharga: total,
        //                 status_transaction: "MENUNGGU",
        //                 payment: "BCA",
        //                 _token: csrfToken
        //             };
        //             var orderid = [];
        //             @foreach ($orderMenu as $omID)
        //                 orderid.push("{{ $omID->code_order }}");
        //             @endforeach
        //             data.orderid = orderid;
        //             $.ajax({
        //                 type: 'POST',
        //                 url: '{{ route('transaksi') }}',
        //                 data: data,

        //                 success: function(response) {
        //                     console.log(response);
        //                 },
        //                 error: function(error) {
        //                     console.log(error);
        //                 }
        //             });
        //         }
        //     });

        // })
    });
</script>

</html>
