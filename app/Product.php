<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaypalPayment;
use App\Http\Models\ProductMedida;
class Product extends Model
{	
	protected $fillable= ["status"];
	public function scopeLatest($query){
		return $query->orderBy("id","desc");
	}

    

    public function product_line(){
        return $this->belongsTo("App\Product_line",'product_type');
    }
    public function paypalItem(){
    	//$totalUSD = $this->pricing / 3000;
    	return \PaypalPayment::item()->setNAme($this->title)->setDescription($this->description)->setCurrency('USD')->setQuantity(1)->setPrice($this->pricing);
    }
    public function medidas(){
        return ProductMedida::getMedida($this->id);
    }
    

    public function delete_status(){
    	
        
        $this->status= 1;
    }
}
