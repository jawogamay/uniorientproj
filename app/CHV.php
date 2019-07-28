<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CHV extends Model
{
     protected $fillable = [
        'user_id','startchv'
    ];

     public function user(){
        return $this->belongsTo('App\User');
    }

}
