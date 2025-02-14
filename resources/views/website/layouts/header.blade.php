 <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{route('/')}}"><img src="{{asset('assets/site/img/logo1.png')}}" width="50" height="50"  alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{route('/')}}">Home</a></li>
                            <li class="nav-item "><a class="nav-link" href="{{route('blog.index')}}">Blog</a></li>
                            @if(!Auth::guard('web')->check())
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                       aria-expanded="false">Auth</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                    </ul>
                                </li>
                            @endif

                            <li class="nav-item"><a class="nav-link" href="{{route('contact.index')}}">Contact</a></li>
                        </ul>

                        <ul class="nav-shop">
{{--                            <li class="nav-item"><button><i class="ti-heart"></i></button></li>--}}
                            <a href="{{route('favoriteProducts')}}">
                                <li class="nav-item"><button><i class="ti-heart"></i>
                                        <span class="nav-shop__circle">
                                             @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                                @php($user = \Illuminate\Support\Facades\Auth::guard('web')->user())
                                                {{$user->favoriteProducts->count()}}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </button>
                                </li>
                            </a>
                        <a href="{{route('cartProducts')}}">

                            <li class="nav-item">
                                <button>
                                    <i class="ti-shopping-cart"></i>
                                    <span class="nav-shop__circle">
                                     @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                            @php($user = \Illuminate\Support\Facades\Auth::guard('web')->user())
                                            @php($latestCart = $user->carts()->latest()->first())
                                            @if($latestCart && $latestCart->opened != 1 && $latestCart->products()->where('is_deleted', 0)->count() > 0)
                                                {{ $latestCart->products()->where('is_deleted', 0)->count() }}
                                     @else
                                                0
                                     @endif
                                     @else
                                     0
                                        @endif
        </span>
                                </button>
                            </li>

                        </a>
                        </ul>
                        @auth('web')
                            <div class="dropdown ml-3">
                                <button class="btn btn-brown dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('web')->user()->name }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-brown dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>

 <style>
     /* Custom brown button */
     .btn-brown {
         background-color: #8B4513;
         border-color: #8B4513;
         color: #fff;
     }

     .btn-brown:hover,
     .btn-brown:focus {
         background-color: #A0522D;
         border-color: #A0522D;
         color: #fff;
     }

     /* Custom brown dropdown menu */
     .dropdown-menu-brown {
         background-color: #D2B48C;
         border: 1px solid #8B4513;
     }

     .dropdown-menu-brown .dropdown-item {
         color: #5A3A22;
     }

     .dropdown-menu-brown .dropdown-item:hover,
     .dropdown-menu-brown .dropdown-item:focus {
         background-color: #A0522D;
         color: #fff;
     }
 </style>
