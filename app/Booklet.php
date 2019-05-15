<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booklet extends Model
{

    protected $fillable = [
        'user_id','bookletNumber','first','second'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
