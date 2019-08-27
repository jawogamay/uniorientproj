<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesSummaries extends Model
{
    //
    protected $fillable = [
        'user_id','customer_id','passenger_name','verified','soa','salesagreement'
    ];
      public function user(){
        return $this->belongsTo('App\User');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
