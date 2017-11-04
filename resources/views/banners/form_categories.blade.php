{!!Form::open(['url' => $url, 'method' => $method , 'files' => true ]) !!}


<div class="form-group">
	{{Form::file('img')}}
</div>
<div class="form-group">
	{{Form::file('img1')}}
</div>
<div class="form-group">
	{{Form::file('img2')}}
</div>
<div class="form-group">
	{{Form::file('img3')}}
</div>
<div class="form-group">
	{{Form::file('img4')}}
</div>
<div class="form-group text-right">
	<input type="submit" value="Enviar" class="btn btn-success">
</div>

{!! Form::close()!!}