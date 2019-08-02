<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartFile extends Model
{
    //
    protected $fillable = [
        'user_id','startsoa','startbooklet','startchv','startcv','startboxpetty','startor','startar','startpr','startpo'
    ];

     public function user(){
        return $this->belongsTo('App\User');
    }
}
