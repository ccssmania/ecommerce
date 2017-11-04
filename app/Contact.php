<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = ["no_cuenta","banco","tel","cel","facebook","email","direccion","description"];
    public $timestamps = false;
}
