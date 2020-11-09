<div class="header2_wrapper">
    <div class="container">
        <div class="clv_header2">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="clv_left_header">
                        <div class="clv_logo">
                            <a href="{{ url('/') }}">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6" style="padding-left: 35px !important ">
                                        <img src="{{ asset('template/frontend/giga/giga.png') }}" alt="Giga"  width="50px" />
                                    </div>
                                    <div class="col-md-6 col-xs-6" style="padding-top: 10px !important; padding-left: 0px !important" >
                                        <img src="{{ asset('template/frontend/giga/fontgiga.png') }}"  alt="Giga"  width="80px" />                
                                    </div>
                                </div>
                            </a>    
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="clv_right_header">
                        <div class="clv_menu">
                            <div class="clv_menu_nav">
                                <ul>
                                    <li>
                                        <a href="/">home</a>
                                        {{-- <ul>
                                            <li><a href="index.html">home 1</a></li>
                                            <li><a href="index2.html">home 2</a></li>
                                            <li><a href="index3.html">home 3</a></li>
                                            <li><a href="index4.html">home 4</a></li>
                                            <li><a href="index5.html">home 5</a></li>
                                            <li><a href="index6.html">home 6</a></li>
                                        </ul> --}}
                                    </li>
                                    <li><a href="/#pelayanan">Pelayanan</a></li>
                                    <li><a href="/#tentang">Tentang Kami</a></li>
                                    <li><a href="{{ route('allproduk')}}">Produk</a></li>
                                    <li>
                                        <a href="/#testi">Testimoni</a>
                                        {{-- <ul>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog_single.html">blog single</a></li>
                                        </ul> --}}
                                    </li>
                                    {{-- <li>
                                        <a href="javascript:;">pages</a>
                                        <ul>
                                            <li><a href="profile.html">profile</a></li>
                                            <li><a href="products.html">products</a></li>
                                            <li><a href="product_single.html">product single</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="cart_single.html">my cart</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="/#kontak">Kontak Kami</a></li>
                                </ul>
                            </div>
                           @if (Auth::check() && Auth::user()->role == 'Members')
                            <div class="cart_nav">
                                <ul>
                                    <li>
                                        <a data-toggle="tooltip" title="Pengaturan Akun" class="akun-settings" href="{{ route('akun') }}"><i  style="font-size: 20px; padding-top: 9px; color: black;" class="fa fa-user-o " aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Keranjang" class="" href="{{ route('tampil.cart') }}">
                                            <svg 
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="18px" height="20px">
                                            <path fill-rule="evenodd"  fill="rgb(0, 0, 0)"
                                             d="M16.712,5.566 C16.682,5.244 16.404,4.997 16.071,4.997 L12.857,4.997 L12.857,3.747 C12.857,1.678 11.127,-0.004 9.000,-0.004 C6.873,-0.004 5.143,1.678 5.143,3.747 L5.143,4.997 L1.928,4.997 C1.595,4.997 1.318,5.244 1.288,5.566 L0.002,19.315 C-0.014,19.490 0.046,19.664 0.168,19.793 C0.290,19.923 0.462,19.997 0.643,19.997 L17.357,19.997 C17.538,19.997 17.710,19.923 17.832,19.793 C17.952,19.664 18.014,19.490 17.997,19.315 L16.712,5.566 ZM6.428,3.747 C6.428,2.367 7.582,1.247 9.000,1.247 C10.417,1.247 11.571,2.367 11.571,3.747 L11.571,4.997 L6.428,4.997 L6.428,3.747 ZM1.347,18.745 L2.515,6.247 L5.143,6.247 L5.143,7.670 C4.759,7.887 4.500,8.286 4.500,8.746 C4.500,9.436 5.076,9.996 5.786,9.996 C6.495,9.996 7.071,9.436 7.071,8.746 C7.071,8.286 6.812,7.887 6.428,7.670 L6.428,6.247 L11.571,6.247 L11.571,7.670 C11.188,7.887 10.928,8.284 10.928,8.746 C10.928,9.436 11.505,9.996 12.214,9.996 C12.924,9.996 13.500,9.436 13.500,8.746 C13.500,8.286 13.240,7.887 12.857,7.670 L12.857,6.247 L15.484,6.247 L16.653,18.745 L1.347,18.745 Z"/>
                                            </svg>
                                            @if (Auth::check())
                                            @php
                                                if (Auth::check()) {
                                                    $user_id = Auth::user()->id;
                                                    $pemesanan = \App\Pemesanan::where([
                                                        ['user_id',$user_id],
                                                        ['status','=', NULL],
                                                        ])
                                                    ->select('*')
                                                    ->first();
                                                    $keranjang = \App\Keranjang::where( 'pemesanan_id','=',$pemesanan->id)
                                                                ->count();
                                                } else {
                                                    $keranjang = 0;
                                                }   
                                            @endphp
                                            <span style="background-color: #1FA12E; color: white; border-radius: 50%; font-size: 10px; font-weight: bold; padding: 2px;">{{ $keranjang }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Daftar Alamat" class="" href="{{ route('akun.alamat') }}"><i  style="font-size: 20px; padding-top: 9px; color: black;" class="fa fa-address-card-o" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Histori Pemesanan" class="" href="{{ route('history.pesan') }}"><i  style="font-size: 20px; padding-top: 9px; color: black;" class="fa fa-book" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tooltip" title="Logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();" class="akun-settings" ><i  style="font-size: 20px; padding-top: 9px; color: black;" class="fa fa-power-off " aria-hidden="true"></i></a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    <li class="menu_toggle">
                                        <span>
                                            <?xml version="1.0" encoding="iso-8859-1"?>
                                            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;" xml:space="preserve" width="20px" height="20px">
                                            <g>
                                                <g>
                                                    <path d="M2,13.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,13.5,2,13.5z"/>
                                                    <path d="M2,28.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,28.5,2,28.5z"/>
                                                    <path d="M2,43.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,43.5,2,43.5z"/>
                                                </g>
                                            </g>
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            @else 
                            <div class="cart_nav">
                                <ul>
                                    <li>
                                        <a data-toggle="tooltip" title="Login / Register" class="akun-settings login-akun" href="javascript:;"><i  style="font-size: 20px; padding-top: 9px; color: black;" class="fa fa-user-o " aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu_toggle">
                                        <span>
                                            <?xml version="1.0" encoding="iso-8859-1"?>
                                            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;" xml:space="preserve" width="20px" height="20px">
                                            <g>
                                                <g>
                                                    <path d="M2,13.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,13.5,2,13.5z"/>
                                                    <path d="M2,28.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,28.5,2,28.5z"/>
                                                    <path d="M2,43.5h49c1.104,0,2-0.896,2-2s-0.896-2-2-2H2c-1.104,0-2,0.896-2,2S0.896,43.5,2,43.5z"/>
                                                </g>
                                            </g>
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
