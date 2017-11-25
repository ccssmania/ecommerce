<?php

namespace App\Http\Models;


use App\Product;

class ProductsFilter {
    
    
    public static function getProducts($title = null,$pricing = null,$product_type = null){
        $status = 0;
        $products = Product::query();
        
        if($title){
            $products->where('title',"like","%{$title}%");
        }
        
        if($pricing){
            $products->where('pricing',$pricing);
        }
        
        if($product_type){
            $products->where('product_type',$product_type);
        }

        $products->where("status",$status);
        
        $products->orderBy('title');
        
        return $products->paginate(12);
        
    }
    
    
    
}
