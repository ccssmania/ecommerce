<?php

namespace App\Http\Models;


use App\Product;
use App\Medida;

class ProductMedida {
    
    
    public static function getMedida($id){
        $medidas = Medida::query();
        
        $medidas->where("idproduct",$id);
        
        return $medidas->get();
        
    }
    
    
    
}