<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Product;
use App\Banner;
class HomeController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->where("status",0)->paginate(15);
        $banners = Banner::orderBy('id', 'desc')->limit(3)->get();
        
        return view('main.home', ["products" => $products, "banners" => $banners]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $banners = Banner::orderBy('id', 'desc')->limit(3)->get();
        $tipo ="";
        if($id == 0){
            $tipo = "Insumos Médicos";
        }elseif ($id == 1) {
            $tipo = "Instrumental Quirúrgico";
        }elseif ($id == 2) {
            $tipo = "Ayudas Ortopédicas";
        }elseif ($id == 3) {
            $tipo = "Terapia Respiratoria";
        }elseif ($id == 4){
            $tipo = "Salud y Belleza";
        }else $tipo = "Todos Los Productos";
        $product = Product::lastest()->where("product_type",$id)->paginate(10);
        return view("main.home", ["product" => $product, 'tipo' => $tipo, 'banners' => $banners]);
    }

    
}