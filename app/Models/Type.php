<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Type extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
        'title', 'user_id'
    ];

    protected $mappingProperties = array([
        'title'=>[
            'type'=>'string',
            "analyzer" => "standard",
        ]

    ]);

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function titles()
    {
        return $this->belongsToMany('App\Models\Title');
    }

}
