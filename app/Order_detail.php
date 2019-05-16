<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table="order_details";
    protected $fillable=['order_id','product_id','quantity_buy'];
}
