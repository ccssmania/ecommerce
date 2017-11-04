@extends('layouts.app4')

@section("content")
	<header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    @if(isset($img))
                        <img src=" {{'banners/images/category_'.$img->id. '.' .$img->extension}} " class="img-responsive " alt="">
                    @else
                        <img class="img-responsive" src="{{url('/js/startbootstrap-freelancer/img/profile.png')}}" alt="">
                    @endif 
                    <div class="intro-text">
                        <h1 class="name">Health Care</h1>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class=" row">
                <div class="container center-block margin-left">
                    @foreach($product_line as $line)    
                        <div class="col-sm-4 portfolio-item">
                            <a href=" {{url('/home/'.$line->id)}} " class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content">

                                        <i class="fa fa-search-plus fa-3x"></i>
                                    </div>
                                </div>
                                 @if(isset($line->logo))
                                 	<img src=" {{'banners/images/category_'.$line->logo->id. '.' .$line->logo->extension}} " class="img-responsive imagen" alt="Circus tent">
                                 @endif
                                 
                                <h4>{{$line->nombre}}</h4> 
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sobre Nosotros</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-3  ">
                </div>
                <div class="col-lg-6">
                    {!! $contact->description !!}
                </div>
                <div class="col-lg-3  ">
                </div>
                @if(Auth::check())
	                <div class="col-lg-8 col-lg-offset-2 text-center">
	                    <a href=" {{url('/about/edit')}} " class="btn btn-lg btn-outline">
	                        <i class="fa fa-edit"></i> Editar
	                    </a>
	                </div>
                @endif
            </div>
        </div>
    </section>
    

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Ubicación</h3>
                        <i class="fa fa-map-marker"></i> {{$contact->direccion}}
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociales </h3>
                        <ul class="list-inline">
                            <li>
                                <a href=" {{$contact->facebook}} " class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Contactanos</h3>
                        <ul>
                        	<li>
                        		<i class="fa fa-phone"> {{$contact->tel}} </i>

                        	</li>
                        	<li>
                        		<i class="fa fa-mobile"> {{$contact->cel}} </i>
                        	</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

@endsection