<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Medida;
use App\Product_line;
use App\Color;
use Session;
class ProductsController extends Controller
{

    public function __construct(){
        $this->middleware("auth", ["except" => "show"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where("status",0)->paginate(12);
        return view("products.index",["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $product_line = Product_line::all();
        return view("products.create", ["product" => $product, 'product_line' => $product_line]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->descripcion;
        $product->pricing=$request->pricing;
        $product->user_id = Auth::user()->id;
        $product->product_type = $request->product_type;
        if($hasFile){
            $extension = $request->cover->extension();
        }
        $product->extension =$extension;
        if ($product->save()){

            if(isset($request->medidas) && count($request->medidas) > 0){
                $i = 0;
                $precios = $request->precios;
                foreach ($request->medidas as $medida) {
                    $newM = new Medida;
                    $newM->idproduct = $product->id;
                    $newM->nombre = $medida;
                    $newM->precio = $precios[$i];
                    $i++;
                    if($newM->nombre != '')
                        if($newM->save()) {
                            $product->medida = 1;
                            $product->save();
                        }
                }
            }
            if(isset($request->colors) && count($request->medidas) > 0){
                foreach ($request->colors as $color) {
                    $newC = new Color;
                    $newC->product_id = $product->id;
                    $newC->name = $color;
                    if($newC->name != '')
                        if($newC->save()) {
                            $product->color = 1;
                            $product->save();
                        }
                }
            }
            if($hasFile){
                $request->cover->storeAs('images',"$product->id".".$extension");
            }
            Session::flash("message","¡Producto Guardado!");
            return redirect("/products");
        }else{
            Session::flash("errorMessage","¡Algo esta mal!");
            return view("products.create",['products' => $products]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view("products.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $product_line = Product_line::all();
        $medidas = Medida::where('idproduct', $product->id)->get();
        $colors = Color::where('product_id', $product->id)->get();
        return view("products.edit", compact('product','medidas', 'product_line','colors'));
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
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        if($hasFile){
            $extension = $request->cover->extension();
        }
        $product = Product::find($id);
        $medidas = Medida::where('idproduct', $product->id)->get();
        $colors = Color::where('product_id', $product->id)->get();
        if(isset($request->medidas) && count($request->medidas) > 0){
            if(isset($medidas)){
                foreach ($medidas as $medida) {
                    $medida->delete();
                }
            }
            $i = 0;
            $precios = $request->precios;
            foreach ($request->medidas as $medida) {
                $newM = new Medida;
                $newM->idproduct = $product->id;
                $newM->nombre = $medida;
                $newM->precio = $precios[$i];
                $i++;
                if($newM->nombre != '')
                    if($newM->save()) $product->medida = 1;
            }
        }elseif(!isset($request->medida) && isset($medidas)){
            if(isset($medidas)){
                foreach ($medidas as $medida) {
                    $medida->delete();
                }
            }
            $product->medida = 0;
        }
        if(isset($request->colors) && count($request->medidas) > 0){
            if(isset($colors)){
                foreach ($colors as $color) {
                    $color->delete();
                }
            }
            foreach ($request->colors as $color) {
                $newM = new Color;
                $newM->product_id = $product->id;
                $newM->name = $color;
                if($newM->name != '')
                    if($newM->save()) {
                        $product->color = 1;
                    }
            }
        }elseif(!isset($request->colors) && isset($colors)){
            foreach ($colors as $color) {
                $color->delete();
            }
            $product->color = 0;
        }
        $product->title = $request->title;
        $product->description = $request->descripcion;
        $product->pricing=$request->pricing;


        if ($product->save()){
            if($hasFile){
                $request->cover->storeAs('images',"$product->id".".$extension");
            }
            Session::flash("message", "Actualizado correctamente");
            return redirect("/products");
        }else{
            Session::flash("errorMessage", "Algo Estuvo Mal");
            return redirect("/products");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete_status();
        if ($product->save()){
            return redirect("/products");
        }else{
            return view("products.edit",['products' => $products]);
        }
        //return redirect('/products');

    }
}