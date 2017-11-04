{!! Form::open(['url' => '/in_shopping_carts/'.$product->id.',,'.$shopping_cart->id, 'method' => 'DELETE', 'class' => 'inline-block']) !!}
 	<input type="submit" class="btn btn-link red-text no-padding no-margin no-transform" value="Eliminar">
{!! Form::close() !!}