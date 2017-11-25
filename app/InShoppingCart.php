<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    protected $fillable = ["product_id", "shopping_cart_id",'cantidad','medida_id','color_id','marca_id'];

    public static function productsCount($shopping_cart_id){
    	return InShoppingCart::where("shopping_cart_id",$shopping_cart_id)->count();
    }

    public function product(){
    	return $this->belongsTo("App\Product", 'product_id');
    }
    public function medida(){
    	return $this->belongsTo("App\Medida", 'medida_id');
    }
    public function color(){
        return $this->belongsTo("App\Color", 'color_id');
    }
    public function marca(){
        return $this->belongsTo("App\Marca", 'marca_id');
    }
}
