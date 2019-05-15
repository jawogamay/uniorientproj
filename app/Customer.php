<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'account_name','address','nature','company','firstname','middlename','lastname','term','sss','secreg','tin','contact','passenger_id','user_id'
    ];
    public function passenger(){
        $this->hasMany('App\Passenger');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
