<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    protected $fillable = [
        'title', 'slug', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }
}
