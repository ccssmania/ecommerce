{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'class' => 'inline-block add-to-cart']) !!}
	<input type="hidden" name="" value="{{$product->pricing}}" id="realPrecio_{{$product->id}}">
	<div class="col-md-4">
        <input type="hidden" name="product_id" value="{{$product->id}}">

        <input type="submit" value="Agregar" class="btn btn-info">
    </div>
    <div class="col-md-8">
        <div class="row little-margin-left full-button">
            
            <button onclick="plus('-',this);" type="button" class="col-md-2 btn btn-info fa fa-minus no-margin"></button>
            <div class="col-md-3 col-xs-3 no-margin">
                
                <input class="form-control"  type="text" id="cant"  name="cantidad"  value="1">
            </div>
            <button onclick="plus('+',this);" type="button" class="col-md-2 fa fa-plus btn btn-info no-margin"></button>
        </div>
    </div>

    @if($product->medida == 1)
            <label class="col-md-3 little-margin-top">Medidas</label>
            <div class="col-md-8 little-margin-top">
                @if($product->marca == 0)
                <select class="form-control personal-select" name="idmedida" required="true" onchange="sendPrice($(this),{{$product->id}})">
                    <option value=""> Seleccionar </option>
                    @foreach($product->medidas() as $medida)
                        <option value="{{$medida->id}}//{{$medida->precio}}">{{$medida->nombre}}</option>
                    @endforeach
                </select>
                @else
                <select class="form-control personal-select" name="idmedida" required="true" >
                    <option value=""> Seleccionar </option>
                    @foreach($product->medidas() as $medida)
                        <option value="{{$medida->id}}//{{$medida->precio}}">{{$medida->nombre}}</option>
                    @endforeach
                </select>
                @endif
            </div>
        
    @endif
    @if($product->marca == 1)
            <label class="col-md-3">Marcas</label>
            <div class="col-md-8 ">
                <select class="form-control personal-select" name="idmarca" required="true" onchange="sendPrice($(this),{{$product->id}})">
                    <option value=""> Seleccionar </option>
                    @foreach($product->marcas as $marca)
                        <option value="{{$marca->id}}//{{$marca->precio}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
            </div>
        
    @endif

    @if($product->color == 1)
        <label class="col-md-3">Colores</label>
        <div class="col-md-8">
            <select class="form-control personal-select" name="idcolor" required="true" >
                <option value="">Seleccionar</option>
                @foreach($product->colores as $color)
                    <option value="{{$color->id}}"> {{$color->name}} </option>
                @endforeach
            </select>
        </div>
    @endif

{!! Form::close() !!}