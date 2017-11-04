<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    public $timestamps = false;
    protected $table = "medidas";
    protected $fillable = ['nombre','descripcion','idproduct'];
}
