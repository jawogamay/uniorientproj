<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'user_id','company','address','tel','fax','email','mobile','notes'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
