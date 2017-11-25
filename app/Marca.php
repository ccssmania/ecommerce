<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marcas";
    public $timestamps = null;
    protected $fillable = ["idproduct","nombre", "precio"];
}