<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SaleAgreement extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'saNumber','user_id','is_used'
    ];

}
