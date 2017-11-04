{!!Form::open(['url' => '/carrito', 'method' => 'POST', 'class' => 'inline-block']) !!}
	@if($total > 0)
		<input type="submit" class="btn btn-success" value="Comprar">
	@else
		<input type="button" class="btn btn-danger" value="Nada para Comprar">
	@endif
{!!Form::close() !!}