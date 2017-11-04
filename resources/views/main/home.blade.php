@extends('layouts.app3')

@section('title', 'productos')

@section('content')
	<div class="container">

        <div class="row">

            <div class="col-md-3">
                <h3>Categorías</h3>
                <div class="list-group green">

                    @foreach($product_line as $line)
                        <a href="{{url('/home/'.$line->id)}}" class="list-group-item green"> {{$line->nombre}} </a>
                    @endforeach
                </div>

                <form>
                    <h3>Filtrar</h3>
                    @if($tipo == "Todos Los Productos")
                        <div class="row">
                            
                            <label class="control-label col-md-4">Tipo</label>
                            <div class="col-md-8">
                                <select name="line" class="form-control">
                                    <option value="">Tipo de producto</option>
                                    @foreach($product_line as $line)
                                        <option value="{{$line->id}}"> {{$line->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <label class="control-label col-md-4">Nombre</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nombre" value="{{$request->nombre ? $request->nombre : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <label class="control-label col-md-4">Precio</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="pricing" value=" {{$request->pricing ? ($request->pricing) : ''}} ">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                @if(isset($banners[0]) && $banners[0]->extension)
                                <div class="item active">
                                    
                                        <img class="slide-image" src="{{url('banners/images/banner_' .$banners[0]->id.'.'.$banners[0]->extension)}}" alt="">
                                    
                                </div>
                                @endif
                                @if(isset($banners[1]) && $banners[1]->extension)
                                <div class="item">
                                    
                                        <img class="slide-image" src="{{url('banners/images/banner_' .$banners[1]->id.'.'.$banners[1]->extension)}}" alt="">
                                    
                                </div>
                                @endif
                                @if(isset($banners[2]) && $banners[2]->extension)
                                <div class="item">
                                    
                                        <img class="slide-image" src="{{url('banners/images/banner_' .$banners[2]->id.'.'.$banners[2]->extension)}}" alt="">
                                   
                                </div>
                                 @endif
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="text-center tipo">
                    <h3> {{$tipo}} </h3>
                </div>
                <div class="row">
                	@foreach($products as $product)
                		@include("products.products",["product" => $product])
                	@endforeach
                </div>

                <div class="text-center">
			    	{{$products->links()}}
				</div>

			</div>

        </div>

    </div>

    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
@endsection
