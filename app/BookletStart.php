<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookletStart extends Model
{
    //
    protected $fillable = [
        'user_id','startbooklet'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
