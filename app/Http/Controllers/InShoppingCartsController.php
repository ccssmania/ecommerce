<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\InShoppingCart;


class InShoppingCartsController extends Controller
{

    public function __construct(){
        $this->middleware("shoppingcart");
    }
    

    /**
   
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopping_cart = $request->shopping_cart;
        $idMedida = explode("//",$request->idmedida);
        if(isset($idMedida) && count($idMedida) > 1){

            $response = InShoppingCart::create([
                "shopping_cart_id" => $shopping_cart->id,
                "product_id" => $request->product_id,
                "cantidad" => $request->cantidad,
                "medida_id" => $idMedida[0]
            ]);
        }else{
            $response = InShoppingCart::create([
            "shopping_cart_id" => $shopping_cart->id,
            "product_id" => $request->product_id,
            "cantidad" => $request->cantidad
        ]);
        }

        if($request->ajax()){
            return response()->json([
                    'products_count' => InShoppingCart::productsCount($shopping_cart->id)
                ]);
        }

        if($response){
            return redirect('/carrito');
        }else
            return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids= explode(",,",$id);
        $id_product = $ids[0];
        $shopping_cart_id = $ids[1];
        $id_in = InShoppingCart::where("product_id","=",$id_product)->where("shopping_cart_id",$shopping_cart_id)->first();
        InShoppingCart::destroy($id_in->id);
        return redirect('/carrito');
    }
}
