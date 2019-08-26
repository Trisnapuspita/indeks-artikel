<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'longname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }

    public function times()
    {
        return $this->hasMany('App\Models\Time');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\Language');
    }

    public function formats()
    {
        return $this->hasMany('App\Models\Format');
    }

    public function statuses()
    {
        return $this->hasMany('App\Models\Status');
    }

    public function titles()
    {
        return $this->belongsToMany('App\Models\Title');
    }

    public function editions()
    {
        return $this->hasMany('App\Models\EditionTitle');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\ArticleEdition');
    }

}
