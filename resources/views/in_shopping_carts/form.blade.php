{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'class' => 'inline-block add-to-cart']) !!}
	<input type="hidden" name="" value="{{$product->pricing}}" id="realPrecio">
	<div class="col-md-4">
        <input type="hidden" name="product_id" value="{{$product->id}}">

        <input type="submit" value="Agregar" class="btn btn-info">
    </div>
    <div class="col-md-8">
        <div class="row little-margin-left full-button">
            
            <button onclick="plus('-',this);" type="button" class="col-md-2 btn btn-info fa fa-minus no-margin"></button>
            <div class="col-md-3 no-margin">
                
                <input class="form-control"  type="text" id="cant"  name="cantidad"  value="1">
            </div>
            <button onclick="plus('+',this);" type="button" class="col-md-2 fa fa-plus btn btn-info no-margin"></button>
        </div>
    </div>

    @if($product->medida == 1)
            <label class="col-md-2 little-margin-top">Medidas</label>
            <div class="col-md-8 little-margin-top">
                <select class="form-control personal-select" name="idmedida" required="true" onchange="sendPrice($(this))">
                    <option value=""> Seleccionar </option>
                    @foreach($product->medidas() as $medida)
                        <option value="{{$medida->id}}//{{$medida->precio}}">{{$medida->nombre}}</option>
                    @endforeach
                </select>
            </div>
        
    @endif

{!! Form::close() !!}