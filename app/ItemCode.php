<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCode extends Model
{
    //
    protected $fillable = [
        'ticket','tax','hotel','package','service_fee','documentation','user_id'
    ];
         public function user(){
        return $this->belongsTo('App\User');
    }
}
