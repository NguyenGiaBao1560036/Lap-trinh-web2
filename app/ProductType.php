<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $table = "type_products";
    public function  product (){
    	return $this->hasMany('App\Product','id_type','id');
    }
}
