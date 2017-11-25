@extends("layouts.app3")


@section("content")

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Dashboard</h2>
		</div>
		<div class="panel-body">
			<h3>Estadísticas</h3>

			<div class="row top-space">
				<div class="col-xs-4 col-md-3 col-lg-2 sale-data">
					<td><span>{{$totalMonth}}</span></td>
					Ingreso del mes
				</div>
				<div class="col-xs-4 col-md-3 col-lg-2 sale-data">
					<span>{{$totalMonthCount}}</span>
					Número de ventas
				</div>

			</div>
			<h3>Ventas</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>ID. venta</td>
						<td>Comprador</td>
						<td>Dirección</td>
						<td>Quien Recibe</td>
						<td>Valor</td>
						<td>No.guía</td>
						<td>Status</td>
						<td>Fecha de venta</td>
						<td>Metodo de pago</td>
						<td>Action</td>

					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{$order->email}}</td>
							<td>{{$order->address()}}</td>
							<td> {{$order->recipient_name}} </td>
							<td> {{$order->total}} </td>
							<td>
								<a href="#" data-type="text" data-pk="{{$order->id}}" data-url="{{url('/orders/'.$order->id)}}" data-title="Número guía" data-value="{{$order->guide_number}}" class="set-guide-number" data-name="guide_number"></a>
							</td>
							<td>
								<a href="#" data-type="select" data-pk="{{$order->id}}" data-url="{{url('/orders/'.$order->id)}}" data-title="Status" data-value="{{$order->status}}" class="select-status" data-name="status"></a>
							</td>
							<td>{{$order->created_at}}</td>
							<td> {{$order->payment_type}} </td>
							<td><a data-toggle="modal" data-target="#modal{{$order->id}}" href="#modal{{$order->id}}" ">Ver</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@foreach($orders as $order)
	<div class=" modal fade in" id="modal{{$order->id}}" >
	
	  <!-- Modal content-->
	  <div class="modal-content margin-top modal-responsive">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">{{$order->email}}</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Valor Unitario</th>
						<th>Marca</th>
						<th> Medida </th>
						<th> Color </th>
					</tr>
				</thead>
				<tbody>
					@foreach($order->shopping_cart->in_shopping_carts as $in)
						<tr>
							<th> {{$in->product->title}} </th>
							<th> {{$in->cantidad}} </th>
							@if(isset($in->medida_id) && $in->medida->precio > 0 && !isset($in->marca))
								<td> ${{$in->medida->precio}} </td>
							@elseif(isset($in->marca) && $in->marca->precio > 0)
								<td>${{$in->marca->precio}}</td>
							@else
								<td>${{$in->product->pricing}} </td>
							@endif
							<th>{{$in->marca ? $in->marca->nombre : '' }}</th>
							<th> {{$in->medida ? $in->medida->nombre : ''}} </th>
							<th> {{$in->color ? $in->color->name : ''}} </th>
						</tr>
					@endforeach
				</tbody>
			</table>
		  
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
	  
	
	</div>
@endforeach
@endsection