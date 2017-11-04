<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\PayPal;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
use App\Order;
use App\Contact;
class ShoppingCartsController extends Controller
{
    public function __construct(){
        $this->middleware("shoppingcart");
    }


    public function show($id){
        $shopping_cart = ShoppingCart::where('customid', $id)->first();

        $order = $shopping_cart->order();
        if($order->payment_type == "contra_entrega")
            return view("shopping_carts.completed", ["shopping_cart" => $shopping_cart, "order" => $order]);
        else {
            $contact = Contact::find(1);
            return view("shopping_carts.completed2", ["shopping_cart" => $shopping_cart, "order" => $order, "contact" => $contact]);
        }
    }
    public function checkout(Request $request){
        $shopping_cart = $request->shopping_cart;
        /*
        $paypal = new PayPal($shopping_cart);
        $payment = $paypal->generate();
        return redirect($payment->getApprovalLink());
        */

        return view("orders.create", ['shopping_cart' => $shopping_cart]);
        
    }
    public function index(Request $request){


    	$shopping_cart = $request->shopping_cart;
        
        $products = $shopping_cart->products()->get();
        $in_shopping_carts = $shopping_cart->in_shopping_carts;
        //dd($in_shopping_carts);
        $total = $shopping_cart->total();

        return view("shopping_carts.index",['products' => $products, 'total' => $total, 'shopping_cart' => $shopping_cart ,'in_shopping_carts' => $in_shopping_carts]);
        
    }
}
