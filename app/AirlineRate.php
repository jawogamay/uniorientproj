<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineRate extends Model
{
    //
    protected $fillable = [
        'rate','date','user_id','day'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
