<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //
    protected $fillable = [
        'user_id','customer_id','lastname','firstname','date_birth','prefix','tel','notes','status','fullname'
    ];

    public function customer(){
       return $this->belongsTo('App\Customer');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
