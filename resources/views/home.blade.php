<!DOCTYPE html>
<html>

<head>
    @include('include.style')
</head>

<body>

    <div class="hero_area">
        <div class="bg-box">
            <div class="bg-op"></div>
            <img src="{{ asset('images/lokasi.jpg') }}" alt="">
        </div>
        <!-- header section strats -->
        <x-navbaruser></x-navbaruser>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section">
            <div id="customCarousel1">
                <div class="hero-inner">
                    <div class="text-support-banner">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Mie Bancir Khas Banjar Agus Sasiringan
                                        </h1>
                                        <p>
                                            Pilihan tempat makan terbaik untuk anda, berbagai menu dari tradisional
                                            hingga modern
                                            tersedia disini dengan harga yang terjangkau, cussss tunggu apa lagi segera
                                            lakukan
                                            pesanan secara online
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Pesan Sekarang
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
        <!-- end slider section -->
    </div>

    <!-- promo section -->

    <section class="promo_section layout_padding-bottom">
        <div class="carousel slide" data-ride="carousel">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Sedang Promo
                    </h2>
                </div>
                <div class="owl-carousel">
                    <div class="card rounded shadow-sm">
                        <div class="card-image-top">
                            <img src="{{ asset('menu/ayam-saos-karamel.jpg') }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5>Ayam Saos Karamel</h5>
                            <div class="potongan">potongan 5000</div>
                            <span class="harga-awal">Rp. 23000</span>
                            <span class="harga-promo">Rp. 18000</span>
                        </div>

                        <div class="btn-buy btn-info btn-sm shadow-sm">
                            <a href="">Beli Sekarang</a>
                        </div>

                    </div>
                    <div class="card rounded shadow-sm">
                        <div class="card-image-top">
                            <img src="{{ asset('menu/gurame-assam-manis.jpg') }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5>Gurame Asam Manis</h5>
                            <div class="potongan">potongan 3000</div>
                            <span class="harga-awal">Rp. 28000</span>
                            <span class="harga-promo">Rp. 23000</span>
                        </div>

                        <div class="btn-buy btn-info btn-sm shadow-sm">
                            <a href="">Beli Sekarang</a>
                        </div>

                    </div>
                    <div class="card rounded shadow-sm">
                        <div class="card-image-top">
                            <img src="{{ asset('menu/pais-patin.jpg') }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5>Pais Patin</h5>
                            <div class="potongan">potongan 3000</div>
                            <span class="harga-awal">Rp. 15000</span>
                            <span class="harga-promo">Rp. 12000</span>
                        </div>

                        <div class="btn-buy btn-info btn-sm shadow-sm">
                            <a href="">Beli Sekarang</a>
                        </div>
                    </div>
                    <div class="card rounded shadow-sm">
                        <div class="card-image-top">
                            <img src="{{ asset('menu/mie-bancir-bakso.jpg') }}" alt="">
                        </div>
                        <div class="card-body">
                            <h5>Mie Bancir Bakso</h5>
                            <div class="potongan">potongan 3000</div>
                            <span class="harga-awal">Rp. 16000</span>
                            <span class="harga-promo">Rp. 13000</span>
                        </div>

                        <div class="btn-buy btn-info btn-sm shadow-sm">
                            <a href="">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- end offer section -->

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Menu Kami
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".makanan">Makanan</li>
                <li data-filter=".minuman">Minuman</li>
                <li data-filter=".cemilan">Cemilan</li>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    {{-- minuman --}}
                    @foreach ($m as $mitem)
                        <div class="col-sm-6 col-lg-4 all minuman">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ url($mitem->photo) }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $mitem->name_menu }}
                                        </h5>
                                        <p>
                                            {{ strip_tags(html_entity_decode($mitem->description_menu)) }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rp {{ number_format($mitem->price_menu, 0) }}
                                            </h6>
                                            <a href="{{ route('detail-menu', $mitem->kd_menu) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- makanan --}}
                    @foreach ($mb as $mbitem)
                        <div class="col-sm-6 col-lg-4 all makanan">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ url($mbitem->photo) }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $mbitem->name_menu }}
                                        </h5>
                                        <p>
                                            {{ strip_tags(html_entity_decode($mbitem->description_menu)) }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rp {{ number_format($mbitem->price_menu, 0) }}
                                            </h6>
                                            <a href="{{ route('detail-menu', $mbitem->kd_menu) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- cemilan --}}
                    @foreach ($mr as $mrbitem)
                        <div class="col-sm-6 col-lg-4 all cemilan">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ url($mrbitem->photo) }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $mrbitem->name_menu }}
                                        </h5>
                                        <p>
                                            {{ strip_tags(html_entity_decode($mrbitem->description_menu)) }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rp {{ number_format($mrbitem->price_menu, 0) }}
                                            </h6>
                                            <a href="{{ route('detail-menu', $mrbitem->kd_menu) }}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end food section -->
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('images/logo-mie-bancir.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Mie Bancir Khas Banjar Agus Sasiringan
                            </h2>
                        </div>
                        <p>
                            Mie Bancir khas banjar merupakan tempat usaha makananan dari seorang
                            finalis yang berhasil menjadi pemenang pada ajang Wirausaha Muda Mandiri (WMM) 2015
                            yang digelar oleh Bank Mandiri Regional IX Kalimantan
                            Ada 10 varian menu yang disajikan, ada mie bancir original, mie bancir ayam panggang, mie
                            bancir
                            ceker, dan lainnya dengan varian rasa pedas bebaya, pedas bujuran,
                            pedas maliyut, dan pedas liwar serta menu-menu lainnya yang tidak kalah enak.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Memesan Meja
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="">
                            <div>
                                <input type="text" class="form-control" placeholder="Nama Pemesan" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Nomor Handphone" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email Pemesan" />
                            </div>
                            <div>
                                <input type="number" class="form-control" placeholder="Jumlah Orang" />
                            </div>
                            {{-- <div>
                                <select class="form-control nice-select wide">
                                    <option value="" disabled selected>
                                        Pilih Jumlah Oramg
                                    </option>
                                    <option value="">
                                        5
                                    </option>
                                    <option value="">
                                        7
                                    </option>
                                    <option value="">
                                        Acara Grup
                                    </option>
                                </select>
                            </div> --}}
                            <div>
                                <input type="date" class="form-control">
                            </div>
                            <div class="btn_box">
                                <button>
                                    Pesan Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15933.054199053033!2d114.5896755!3d-3.2847271!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230a211e0d25%3A0xe38d400f895698ff!2sMie%20Bancir%20Khas%20Banjar%20Agus%20Sasirangan%20Outlet%20KAYUTANGI!5e0!3m2!1sid!2sid!4v1697694192272!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    Apa Kata Pelanggan Kami
                </h2>
            </div>
            <div class="carousel-slide row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box shadow">
                                <p>
                                    " Mie Bancir Ayam Panggangnya nyaman banar, harga paslah lawan kantong
                                    the bestlah pokoknya "
                                </p>
                                <div class="content-review">
                                    <div class="img-box">
                                        <img src="images/client1.jpg" alt="" class="box-img">
                                    </div>
                                    <div class="name" style="width: 100%">
                                        <h6>
                                            Aluh Icu
                                        </h6>
                                        <p>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box shadow">
                                <p>
                                    " Mie Bancir Ayam Panggangnya nyaman banar, harga paslah lawan kantong
                                    the bestlah pokoknya "
                                </p>
                                <div class="content-review">
                                    <div class="img-box">
                                        <img src="images/client1.jpg" alt="" class="box-img">
                                    </div>
                                    <div class="name" style="width: 100%">
                                        <h6>
                                            Aluh Icu
                                        </h6>
                                        <p>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box shadow">
                                <p>
                                    " Mie Bancir Ayam Panggangnya nyaman banar, harga paslah lawan kantong
                                    the bestlah pokoknya "
                                </p>
                                <div class="content-review">
                                    <div class="img-box">
                                        <img src="images/client1.jpg" alt="" class="box-img">
                                    </div>
                                    <div class="name" style="width: 100%">
                                        <h6>
                                            Aluh Icu
                                        </h6>
                                        <p>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->

    <!-- footer section -->
    <x-footeruser></x-footeruser>
    <!-- footer section -->

    {{-- script --}}
    @stack('before-main')
    @include('include.main')


</body>

</html>
