<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'itemcode','cost','quantity','description','currency','total','saNumber'
    ];
}
