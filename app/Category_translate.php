<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_translate extends Model
{
   	protected $table='category_translates';
    protected $fillable=['category_id','language_id','name'];
}
