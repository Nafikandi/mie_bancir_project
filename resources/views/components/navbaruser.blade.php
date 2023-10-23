<header class="header_section" style="background: #222831">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/">
                <div class="bg-light rounded pr-3">
                    <img src="{{ asset('images/logo-mie-bancir.svg') }}" alt="" style="width: 50px;">
                    <span class="text-dark">Sasiringan</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.html">Reservasi</a>
                    </li>
                </ul>
                <div class="user_option">
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="cart_link" href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="user_link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    @endguest

                    @auth
                        <a href="#" class="user_link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @endauth


                    {{-- <a href="" class="order_online">
                        Order Online
                    </a> --}}
                </div>
            </div>
        </nav>
    </div>
</header>
