<div class="card product text-left container" >
	@if(Auth::check())
		<div class="text-right actions">
			<a href="{{url('/products/'. $product->id .'/edit')}}">
							Editar
			</a>
			@include('products.delete',['product' =>$product])
		</div>
	@endif
	<h1 class="break-word">{{$product->title}}</h1>
	
	<div >
		<div class="col-sm-6">
			@if($product->extension)
				<img src="{{url("products/images/$product->id.$product->extension")}}" class="product-avatar">
			@endif
		</div>
		<div class="col-sm-6">
			<p>
				<strong>Descripcción</strong>
			</p>
			<table>
				<td>
					{!!$product->description!!}
				</td>
			</table>
				
			
			<br>
			<p >
				<strong>Precio</strong>
			</p>
			<p id="precio">
				${{$product->pricing}}
			</p>
			<p>
				@include("in_shopping_carts.form", ["product" => $product])
			</p>
		</div>
			
	</div>
</div>