<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    
    protected $fillable = [
        'title', 'slug', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
