{!!Form::open(['url' => '/payments', 'method' => 'POST']) !!}

<div class="form-group">
	{{Form::hidden('shopping_cart_id', $shopping_cart->id)}}
</div>
<div class="form-group">
	{{Form::text('email','',['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required'])}}
</div>
<div class="form-group">
	{{Form::text('direccion1','',['class' => 'form-control', 'placeholder' => 'Direccion', 'required' => 'required'], $attributes =['required' => 'required'])}}
</div>
<div class="form-group">
	{{Form::text('direccion2','', ['class' => 'form-control', 'placeholder' => 'Datos adicionales'])}}
</div>
<div class="form-group">
	{{Form::text('ciudad', '',['class' => 'form-control', 'placeholder' => 'ciudad', 'required' => 'required'])}}
</div>

<div class="form-group">
	{{Form::text('recipient_name', '', ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de quien recibe el producto'])}}
</div>

<div class="form-group">
	{{Form::select('payment_type', ['contra_entrega' => 'ContraEntrega'], null, ['class' => 'form-control', 'placeholder' => 'Elige el metodo de pago', 'required' => 'required'])}}
</div>
<div class="form-group text-right">
	<a href="{{ url('/') }}"> Regresar al listado de productos</a>
	<input type="submit" value="Comprar" class="btn btn-success">
</div>

{!! Form::close()!!}