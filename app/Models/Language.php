<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    
    protected $fillable = [
        'title', 'slug', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function isOwner()
    {
        if(Auth::guest())
            return false;

        return Auth::user()->id == $this->user->id;
    }
}
