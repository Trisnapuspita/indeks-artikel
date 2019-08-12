<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    
    protected $fillable = [
        'title', 
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
