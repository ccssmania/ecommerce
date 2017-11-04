@extends("layouts.app3")

@section("content")
	<div class="container white"> 
		<h1>Editar el producto {{$product->title}}</h1>
		@include('products.form',['product' => $product, 'url' => '/products/'.$product->id, 'method' => 'PUT'])
	</div>
@endsection