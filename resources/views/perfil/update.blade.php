@extends("layouts.app3")

@section("content")
	<div class="container white"> 
		<h1>Actualiza Los datos</h1>
		@include('perfil.form',['contact' => $contact, 'url' => '/about/img', 'method' => 'POST'])
	</div>
@endsection