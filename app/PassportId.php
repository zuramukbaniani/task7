<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassportId extends Model
{
    protected $fillable = [
        'passport_id', 'user_id'
    ];
}
