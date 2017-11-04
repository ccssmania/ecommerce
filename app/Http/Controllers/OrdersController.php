<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\ShoppingCart;
class OrdersController extends Controller
{



    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
        $totalMonth = Order::totalMonth();
        $totalMonthCount = Order::totalMonthCount();

        return view('orders.index',['orders'=> $orders, 'totalMonth' => $totalMonth, 'totalMonthCount' => $totalMonthCount]);
    }


    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $field = $request->name;

        $order->$field = $request->value;
        //echo $order;
        $order->save();
        return $order->$field;
    }

    public function view($id){
        $shopping_cart = ShoppingCart::find($id);
        $in_shopping_carts = $shopping_cart->in_shopping_carts;
        return view("orders.view", compact("shopping_cart", "in_shopping_carts"));
    }

    
}
