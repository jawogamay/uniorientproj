<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCode extends Model
{
    //
    protected $fillable = [
        'user_id','itemcode','itemname'
    ];
         public function user(){
        return $this->belongsTo('App\User');
    }
}
