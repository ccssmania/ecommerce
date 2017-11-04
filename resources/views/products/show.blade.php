@extends('layouts.app3')

@section('content')
	<div class="container text-center">
		@include("products.product", ["product" => $product])
	</div>
@endsection