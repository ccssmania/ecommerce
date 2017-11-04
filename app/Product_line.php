<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_line extends Model
{
	public $timestamps = null;
	protected $table = "product_line";
	protected $fillable = ["nombre","descripcion"];

	public function logo(){
        return $this->belongsTo("App\Banner",'id','type_category');
    }
}
