<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['count_money', 'from_user_id', 'to_user_id', 'count_money', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Transfer'); //many to one
    }

}
