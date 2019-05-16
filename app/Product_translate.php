<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_translate extends Model
{
    protected $table="product_translates";
    protected $fillable=['laguage_id',"product_id", 'description','price'];
}
