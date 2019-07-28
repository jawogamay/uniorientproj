<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AR extends Model
{
    //
        protected $fillable = [
        'user_id','startar'
    ];

     public function user(){
        return $this->belongsTo('App\User');
    }
}
