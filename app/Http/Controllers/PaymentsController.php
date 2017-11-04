<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\PayPal;
use App\Order;
use Session;
use App\Contact;
class PaymentsController extends Controller
{
    public function __construct(){
        $this->middleware("shoppingcart");
    }
    public function store(Request $request){
    	$shopping_cart = $request->shopping_cart;

        $paypal = new PayPal($shopping_cart);
        $response =$paypal->execute($request->paymentId,$request->PayerID);

        if($response->state == "approved"){
            $shopping_cart->approve();
        	\Session::remove("shopping_cart_id");
        	$order = Order::createFromPayPalResponse($response, $shopping_cart);
        	


        }
        return view("shopping_carts.completed", ["shopping_cart" => $shopping_cart, "order" => $order]);
        //dd($order);
    }

    public function create(Request $request){

        $shopping_cart = $request->shopping_cart;
        $shopping_cart->approve();
        $order = new Order;
        $order->shopping_cart_id = $shopping_cart->id;
        $order->line1 = $request->direccion1;
        $order->email =$request->email;
        $order->total = $shopping_cart->total();
        $order->payment_type = $request->payment_type;
        if($request->direccion2) {
            $order->line2 = $request->direccion2;
        }
        $order->city = $request->ciudad;
        $order->recipient_name = $request->recipient_name;
        if($order->save()){
            
            \Session::remove("shopping_cart_id");
            if($order->payment_type == "contra_entrega")
                return view("shopping_carts.completed", ["shopping_cart" => $shopping_cart, "order" => $order]);
            else {
                $contact = Contact::find(1);
                return view("shopping_carts.completed2", ["shopping_cart" => $shopping_cart, "order" => $order, "contact" => $contact]);
            }
        }
            else{
                Session::flash('errorMessage', 'no se pudo realizar la compra');
                return redirect("/");
            } 
    }


}
