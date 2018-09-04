<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['count_money'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
