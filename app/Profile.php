<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'city',
        'country',
        'about',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
