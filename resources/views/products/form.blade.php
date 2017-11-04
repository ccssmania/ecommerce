{!!Form::open(['url' => $url, 'method' => $method , 'files' => true,'class' => 'form-horizontal' ]) !!}
	{{ csrf_field() }}
	<div class="container big-margin-top">
		
		<div class="form-group">
			<label class="control-label col-md-4">Titulo</label>
			<div class="col-md-6">
				<input type="text" class="form-control" placeholder="titulo" name="title" value="{{$product->title? $product->title : ''}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Precio</label>
			<div class="col-md-6">
				<input type="number" name="pricing" value="{{$product->pricing ? $product->pricing : ''}}" class="form-control" placeholder="Precio" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Tipo De Producto</label>
			<div class="col-md-6">
				<select class="form-control" name="product_type" required>
					<option value="">Selecciona Uno</option>
					@foreach($product_line as $line)
						@php $selected = $product->product_line->name == $line->name ? 'selected' : '';@endphp
						<option value="{{$line->id}}" {{$selected}} > {{$line->nombre}} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
		@if(isset($product->extension))
			<label class="control-label col-md-4">Imagen</label>
				<div class="col-md-6">
					
					<img src="{{url("products/images/$product->id.$product->extension")}}" class="product-avatar img-responsive">
					
				</div>
			<label class="control-label col-md-4">Subir Imagen</label>
			
				<div class="col-md-6">
					<input type="file" name="cover">
				</div>
			
			@else
		<label class="control-label col-md-4">Subir Imagen</label>
			
			<div class="col-md-6">
				<input type="file" name="cover" required="">
			</div>
			@endif
		</div>
		<div class="form-group">
			<label class="control-label col-md-4">Descripción</label>
			<div class="col-md-6">
				<textarea class="textarea" name="descripcion" required > {{$product->description ? $product->description : ''}} </textarea>
			</div>
		</div>
		@php $checked = ""; $product->medida == 1 ? $checked = "checked" : $checked = ''; @endphp
		<div class="form-group">
			<label class="control-label col-md-4">Medidas</label>
			<div class="col-md-6">
				<input type="checkbox" id="check" name="medida" onclick="check2(this);" {{$checked}}>
			</div>
		</div>

		<div class="form-group" id="div">
			@if($product->medida == 1)
					
					@foreach($medidas as $medida)
						<input type="hidden" name="" value=" {{$medida->nombre}}//{{$medida->Precio}} ">
						<label class="control-label col-md-3">Medida</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="medidas[]"  value="{{$medida->nombre}}">
						</div>
						<label class="col-md-1 control-label">Precio</label>
						<div class="col-md-3">
							<input type="number" name="precios[]" class="form-control" value="{{(integer)$medida->precio}}">
						</div>
					@endforeach
			@endif
		</div>
		<div class="form-group" id="button" style="display: none;">
			
		</div>
		<!-- #######################  -->
		@php $checked = ""; $product->color == 1 ? $checked = "checked" : $checked = ''; @endphp
		<div class="form-group">
			<label class="control-label col-md-4">Colores</label>
			<div class="col-md-6">
				<input type="checkbox" id="check_color" name="color" onclick="check3(this);" {{$checked}}>
			</div>
		</div>

		<div class="form-group" id="div1">
			@if($product->color == 1)
					
					@foreach($colors as $color)
						<input type="hidden" name="" value=" {{$color->name}} ">
						<label class="control-label col-md-3">color</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="colors[]"  value="{{$color->name}}">
						</div>						
					@endforeach
			@endif
		</div>
		<div class="form-group" id="button2" style="display: none;">
			
		</div>
		<div class="form-group">
			
			<div class="col-md-6 col-md-offset-4">
				<a href="{{ url('/products') }}"> Regresar al listado de productos</a>
				<input type="submit" value="Enviar" class="btn btn-success">
			</div>
		</div>
	</div>
{!! Form::close()!!}

