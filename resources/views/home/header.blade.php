<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('mens_all')}}">Men's</a></li>
                            <li class="scroll-to-section"><a href="{{url('womens_all')}}">Women's</a></li>
                            <li class="scroll-to-section"><a href="{{url('kids_all')}}">Kid's</a></li>
                            <li class="scroll-to-section"><a href="{{url('view_orders')}}">Orders</a></li>

                        
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="">Explore</a></li>

                            @auth
                            <li class="scroll-to-section"><a href="{{url('cart_view')}}">Cart[{{$caunt_cart}}]</a></li>
                            @endauth

                            @guest
                            <li class="scroll-to-section"><a href="{{url('cart_view')}}">Cart</a></li>
                            @endguest



                            @if (Route::has('login'))

                            @auth
                            <li >
                            <x-app-layout>
                            </x-app-layout>
                            </li>
                            @else
                            <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
                            <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li>

                            @endauth

                            @endif


                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>