<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	return view('banners.upload');
    }
    public function upload(Request $request){

    	
    	$hasFile = $request->hasFile('cover') && $request->cover->isValid();
    	if($hasFile){
            $extension = $request->cover->extension();
            $banner = new Banner;
            $banner->extension = $extension;
            if($banner->save())
            	$request->cover->storeAs('images',"banner_$banner->id".".$extension");
        }
    	$hasFile1 = $request->hasFile('cover1') && $request->cover1->isValid();
    	if($hasFile1){
            $extension1 = $request->cover1->extension();
            $banner = new Banner;
            $banner->extension = $extension1;
            if($banner->save())
            	$request->cover1->storeAs('images',"banner_$banner->id".".$extension1");
        }

    	$hasFile2 = $request->hasFile('cover2') && $request->cover2->isValid();
    	
        
        if($hasFile2){
            $extension2 = $request->cover2->extension();
            $banner = new Banner;
            $banner->extension = $extension2;
            if($banner->save())
            	$request->cover2->storeAs('images',"banner_$banner->id".".$extension2");
        }

        return redirect('/');
    }

    public function doctor(Request $request){
        
    }
}
