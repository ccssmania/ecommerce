@extends("layouts.app3")
@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>Tu Carrito De Compras</h1>
	</div>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Producto</td>
					<td>Precio Unidad</td>
					<td> Cantidad </td>
					<td>Marca</td>
					<td> Medida </td>
					<td> Color </td>
					<td>Accion</td>
				</tr>
			</thead>
			<tbody>
				@foreach($in_shopping_carts as $in)
					<tr>
						<td> {{$in->product->title}} </td>
						@if(isset($in->medida_id) && $in->medida->precio > 0 && !isset($in->marca))
							<td> ${{$in->medida->precio}} </td>
						@elseif(isset($in->marca) && $in->marca->precio > 0)
							<td>${{$in->marca->precio}}</td>
						@else
							<td>${{$in->product->pricing}} </td>
						@endif
						<td> {{$in->cantidad}} </td>
						<td>{{$in->marca ? $in->marca->nombre : ''}}</td>
						<td> {{$in->medida ? $in->medida->nombre : ''}} </td>
						<td> {{$in->color ? $in->color->name : ''}} </td>
						<td>
							@include("shopping_carts.delete",["product" => $in->product,"shopping_cart" =>$shopping_cart])
						</td>
					</tr>
				@endforeach
				<tr>
					<td>Total</td>
					<td> ${{$total}} </td>
				</tr>
			</tbody>
		</table>
		<div class="text-right">
			@include("shopping_carts.form",["total" => $total])
		</div>
	</div>
@endsection