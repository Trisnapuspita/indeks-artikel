<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'user_id', 'type_id', 'time_id', 'language_id', 'format_id',
        'title', 'slug', 'city', 'publisher', 'year', 'first_year', 'featured_img', 
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function editions()
    {
        return $this->hasMany('App\Models\EditionTitle');
    }

    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    public function times()
    {
        return $this->belongsToMany('App\Models\Time');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language');
    }

    public function formats()
    {
        return $this->belongsToMany('App\Models\Format');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Models\Status');
    }

    
}
