{!!Form::open(['url' => $url, 'method' => $method , 'files' => true ]) !!}


<div class="form-group">
	{{Form::file('cover')}}
</div>
<div class="form-group">
	{{Form::file('cover1')}}
</div>
<div class="form-group">
	{{Form::file('cover2')}}
</div>
<div class="form-group text-right">
	<input type="submit" value="Enviar" class="btn btn-success">
</div>

{!! Form::close()!!}