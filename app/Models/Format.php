<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    
    protected $fillable = [
        'title', 'slug', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function titles()
    {
        return $this->belongsToMany('App\Models\Title');
    }
}
