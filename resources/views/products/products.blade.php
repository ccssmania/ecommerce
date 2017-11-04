{!! Form::open(['url' => '/in_shopping_carts', 'method' => 'POST', 'class' => 'add-to-cart']) !!}
    <div class="col-sm-4 col-lg-4 col-md-4 products">
        <div class="thumbnail">
        @if(Auth::check() )
            <div class="text-right actions">
                <a href="{{url('/products/'. $product->id .'/edit')}}">
                                Editar
                </a>
                @include('products.delete',['product' =>$product])
            </div>
        @endif
            <h4 class="break-word text-center"><a href="{{url('/products/'.$product->id)}}">{{$product->title}}</a></h4>
            @if($product->extension)
                <img src="{{url("products/images/$product->id.$product->extension")}}" class="product-avatar">
            @endif
            
                <h4 id="precio">${{$product->pricing}}</h4>
                <table class="little-margin-bot">
                    <td class="text-center">
                        {!!$product->description!!}
                    </td>
                </table>
                
                <div class="row little-margin-bot">
                    @include("in_shopping_carts.form", ["product" => $product])
                </div>
                
        </div>
    </div>
{!! Form::close() !!}