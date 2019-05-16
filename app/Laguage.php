<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laguage extends Model
{
    protected $table='laguages';
    protected $fillable=['name','summary'];
}
