<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_translate extends Model
{
    protected $table="New_translates";
    protected $fillable=['news_id','language_id','title','content'];
}
