<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->

    <!-- Custom CSS -->
    <link href="{{url('/js/startbootstrap-freelancer/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/js/startbootstrap-freelancer/css/freelancer.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{url('/js/startbootstrap-freelancer/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href=" {{url('/js/jHtmlArea/style/jHtmlArea.css')}} ">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Styles -->
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body>

    <!-- Navigation -->
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=" {{url('/')}} "> {{ config('app.name', 'Laravel') }} </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{url('/about')}}">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href=" {{url('/')}} ">Productos</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li>
                            
                            <a class="fa fa-shopping-cart" href="{{url('/carrito')}}">
                                Mi Carrito
                                <span class="circle-shopping-cart "> {{$productsCount}} </span>
                            </a>
                            </li>
                        @if (Auth::guest())
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ url('/products') }}">Productos</a></li>
                                    <li><a href="{{ url('/orders') }}">Ordenes</a></li>
                                    <li><a href="{{ url('/perfil') }}">Perfil</a></li>
                                    <li><a href="{{ url('/banners') }}">Banners</a></li>
                                    <li>

                                        <a class="fa fa-sign-out" href="{{ route('logout') }}"
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
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        @yield('content')
    </div>

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{url('/js/startbootstrap-freelancer/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/js/startbootstrap-freelancer/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{url('/js/startbootstrap-freelancer/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{url('/js/startbootstrap-freelancer/js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{url('/js/startbootstrap-freelancer/js/freelancer.min.js')}}"></script>
    <script>$.material.init()</script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/home.js') }}"></script>

</body>

</html>
