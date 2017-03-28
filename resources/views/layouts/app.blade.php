<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/projektas.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'cartAddRoute' => route('cart.add'),
            'cartClearRoute' => route('cart.clear'),

            ]) !!};
        </script>
        <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea'
  });
  </script>
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-inverse bg-inverse navbar-static-top" >
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/dishes') }}">
                            <img style="width: 50px" src="http://1.bp.blogspot.com/-wMCW2ukMSsI/To4cNuHpgQI/AAAAAAAACRI/00QKIHx_UIw/s500/Chili%2527s+logo+2011.png">
                        </a>
                        
                            <a class="navTab" href="/tables">Tables</a>
                            <a class="navTab" href="/dishes">Dishes</a>
                            <a class="navTab" href="/contacts">Contacts</a>
                            @if(Auth::user() && Auth::user()->isAdmin())
                            <a class="navTab" href="/users">Users</a>
                            <a class="navTab" href="/orders">Orders</a>
                            @endif
                  
                    </div>
                    
                    
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" arian-expanded="false">Total: <span id="cart-total"> {{ session('cart.total') ?: '0' }} </span> €</a>
                                
                                <ul id="cart-items" class="dropdown-menu" role="menu">

                                    @if(session('cart.items') && count(session('cart.items'))>0)

                                    
                                    @foreach(session('cart.items') as $item)
                                    <li class="text-center">
                                        <a href="">{{ $item['title'] }} x {{$item['quantity']}} <strong> {{ $item['total'] }} euro</strong></a>
                                    </li>
                                    @endforeach
                                    
                                    @endif
                                </ul>
                            </li>
                            <li><a href="#" id="clear-cart">Clear Cart</sub></a></li>


                            <li><a href="{{ route('cart.checkout') }}" id="checkout">Checkout</a></li>


                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('profile') }}">Profile</a>

                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if(session('message'))
    <div class="alert alert-{{ session('message')['type'] }}">
        {{ session('message')['text'] }}
    </div>
    @endif

    


    @yield('content')
</div>

<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
