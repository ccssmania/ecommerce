<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Contact;
use App\Product;
use App\Banner;
use App\Http\Models\ProductsFilter;
use Session;
use App\Product_line;
class MainController extends Controller{
    public function __construct(){
        $this->middleware('auth', ["except" => ['show',"home","about","index"]]);
    }
    public function fix(){
        $products = Product::all();
        $message = "";
        foreach ($products as $product) {
            $anterior = $product->product_type;
            $product->product_type += 1;
            if ($product->save())
                $message = "<br> $product->title ..... type = $product->product_type ..... anterior = $anterior";
        }
        Session::flash("message", $message);
        return redirect("/");
    }
	public function home(Request $request){
        //dd($request);
        
        $product_line = Product_line::all();
		$products = ProductsFilter::getProducts($request->nombre,$request->pricing,$request->line);
        $banners = Banner::where('type_image', 0)->orderBy('id', 'desc')->limit(3)->get();
        
		return view('main.home', ["products" => $products, 'tipo' => 'Todos Los Productos', 'banners' => $banners, "request" => $request, 'product_line' =>$product_line]);

	}
    public function index(Request $request){
        //dd($request);
        $product_line = Product_line::all();
        $products = ProductsFilter::getProducts($request->nombre,$request->pricing,$product->line);
        $banners = Banner::where('type_image', 0)->orderBy('id', 'desc')->limit(3)->get();
        
        return view('main.home', ["products" => $products, 'tipo' => 'Todos Los Productos', 'banners' => $banners, "request" =>$request, 'product_line' => $product_line]);

    }

	 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $banners = Banner::where('type_image', 0)->orderBy('id', 'desc')->limit(3)->get();
        $line = Product_line::find($id);
        $products = ProductsFilter::getProducts($request->nombre,$request->pricing,$line->id);
        $product_line = Product_line::all();
        $tipo = "";
        if(isset($line)){
            $tipo = $line->nombre;
        }else $tipo = "Todos Los Productos";
        return view("main.home", ["products" => $products, 'tipo' => $tipo, 'banners' => $banners,"request" => $request, 'product_line' => $product_line]);
    }

    public function perfil(){
        $contact = Contact::find(1);
        $banners = Banner::where("type_image", 0)->get();
        return view('perfil.update', compact("contact", "banners"));
    }

    public function about(){
        $contact = Contact::find(1);
        $banners = Banner::where('type_image', 1)->orderBy('type_category', 'desc')->limit(5)->get();
        $img = Banner::where('type_image',2)->first();

        $product_line = Product_line::all();
        
        return view('perfil.about', ['contact' => $contact, 'banners' => $banners ,'img' => $img, 'product_line' => $product_line]);
    }

    public function about_edit(){
        $contact = Contact::find(1);
        return view('perfil.about_edit', ['contact' => $contact]);
    }
    public function update(){
        $contact = Contact::find(1);
        return view('perfil.update', ['contact' => $contact]);
    }

    public function store(Request $request){

        $_data = $request->all();
        $contact = Contact::find(1);
        if($contact->update($_data))
            return redirect('/about');
        else {
            Session::flush("errorMessage", "Algo estuvo mal");
            return redirect('/about');
        }
    }

    public function store_img(Request $request){
        
        
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        if($hasFile){
            $extension = $request->cover->extension();
            $banner = new Banner;
            $banner->type_image = 0;
            $banner->extension = $extension;
            if($banner->save())
                $request->cover->storeAs('images',"banner_$banner->id".".$extension");
        }
        $hasFile1 = $request->hasFile('cover1') && $request->cover1->isValid();
        if($hasFile1){
            $extension1 = $request->cover1->extension();
            $banner = new Banner;
            $banner->type_image = 0;
            $banner->extension = $extension1;
            if($banner->save())
                $request->cover1->storeAs('images',"banner_$banner->id".".$extension1");
        }

        $hasFile2 = $request->hasFile('cover2') && $request->cover2->isValid();
        
        
        if($hasFile2){
            $extension2 = $request->cover2->extension();
            $banner = new Banner;
            $banner->type_image = 0;
            $banner->extension = $extension2;
            if($banner->save())
                $request->cover2->storeAs('images',"banner_$banner->id".".$extension2");
        }

        //-------------------Categorias De Productos


        $hasFile3 = $request->hasFile('img') && $request->img->isValid();
        if($hasFile3){
            $extension = $request->img->extension();
            $banner = new Banner;
            $banner->type_image = 1;
            $banner->type_category = 0;

            $exist = Banner::where('type_image',1)->where('type_category', 0)->get()->first();
            if(isset($exist)) Banner::destroy($exist->id);  
            
            $banner->extension = $extension;
            if($banner->save())
                $request->img->storeAs('images',"category_$banner->id".".$extension");
        }
        $hasFile4 = $request->hasFile('img1') && $request->img1->isValid();
        if($hasFile4){
            $extension1 = $request->img1->extension();
            $banner = new Banner;
            $banner->type_image = 1;
            $banner->type_category = 1;

            $exist = Banner::where('type_image',1)->where('type_category', 1)->get()->first();
            if(isset($exist)) Banner::destroy($exist->id);  
            
            
            $banner->extension = $extension1;
            if($banner->save())
                $request->img1->storeAs('images',"category_$banner->id".".$extension1");
        }

        $hasFile5 = $request->hasFile('img2') && $request->img2->isValid();
        
        
        if($hasFile5){
            $extension2 = $request->img2->extension();
            $banner = new Banner;
            $banner->type_image = 1;
            $banner->type_category = 2;

            $exist = Banner::where('type_image',1)->where('type_category', 2)->get()->first();
            if(isset($exist)) Banner::destroy($exist->id);  
            
            
            $banner->extension = $extension2;
            if($banner->save())
                $request->img2->storeAs('images',"category_$banner->id".".$extension2");
        }
        $hasFile6 = $request->hasFile('img3') && $request->img3->isValid();
        if($hasFile6){
            $extension = $request->img3->extension();
            $banner = new Banner;
            $banner->type_image = 1;
            $banner->type_category = 3;

            $exist = Banner::where('type_image',1)->where('type_category', 3)->get()->first();
            if(isset($exist)) Banner::destroy($exist->id);  
            
            
            $banner->extension = $extension;
            if($banner->save())
                $request->img3->storeAs('images',"category_$banner->id".".$extension");
        }
        $hasFile7 = $request->hasFile('img4') && $request->img4->isValid();
        if($hasFile7){
            $extension1 = $request->img4->extension();
            $banner = new Banner;
            $banner->type_image = 1;
            $banner->type_category = 4;

            $exist = Banner::where('type_image',1)->where('type_category', 4)->get()->first();
            if(isset($exist)) Banner::destroy($exist->id);  
            
            
            $banner->extension = $extension1;
            if($banner->save())
                $request->img4->storeAs('images',"category_$banner->id".".$extension1");
        }
        //------------------Imagen Abput-------------

        $img_perfil = $request->hasFile('img_about') && $request->img_about->isValid();
        if($img_perfil){
            $ext = $request->img_about->extension();
            $banner = new Banner;
            $banner->type_image = 2;
            $exist = Banner::where('type_image',2)->first();
            if(isset($exist)) Banner::destroy($exist->id);
            $banner->extension = $ext;
            if($banner->save())
                $request->img_about->storeAs('images',"category_$banner->id".".$ext");
        }


        //:....................................
        $contact = Contact::find(1);

        $contact->no_cuenta= $request->no_cuenta;
        $contact->banco = $request->banco;
        $contact->tel = $request->tel;
        $contact->cel = $request->cel;
        $contact->facebook =$request->facebook;
        $contact->email =$request->email;
        $contact->direccion = $request->direccion;
        $contact->description = $request->description;

        $contact->update();
        

        return redirect('/about');
    }

}