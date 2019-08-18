<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'account_name','address','nature','fax','user_id','deletestatus','term','limit','notes','contact','email'
    ];
    public function passenger(){
        $this->hasMany('App\Passenger');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
/*    public function salesummaries(){
        return $this->belongsTo('App\SalesSummaries');
    }*/
}
