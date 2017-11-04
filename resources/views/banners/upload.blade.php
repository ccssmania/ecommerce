@extends("layouts.app3")

@section("content")
	<div class="container white"> 
		<h1>Subir Imagenes</h1>
		<h3>Importante, las imagenes deben tener el mismo taño, recomendacion 800*300</h3>
		@include('banners.form', ['url' => '/banners', 'method' => 'POST'])
	</div>
@endsection