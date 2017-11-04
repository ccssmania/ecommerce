
@extends('layouts.app3')
@section('content')

	{!!Form::open(['url' => '/about', 'method' => 'POST'  ]) !!}

	<div class="container large-margin">
		<div class="col-lg-3"></div>
		<div class="card text-center col-lg-6">
			<h1>Editar</h1>
			<div class="form-group">
				{{Form::textarea('description', $contact->description,['class' => 'form-control textarea', 'rows' => '20'])}}
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
			
	<div class="form-group text-right">
		<input type="submit" value="Enviar" class="btn btn-success">
	</div>

	{!! Form::close()!!}
@endsection
