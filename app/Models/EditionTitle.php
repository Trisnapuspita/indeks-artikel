<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditionTitle extends Model
{
    protected $fillable = [
        'id', 'user_id', 'title_id', 'edition_year', 'edition_title', 'slugs', 'volume', 'chapter', 'edition_no',
        'publish_date', 'publish_month', 'publish_year', 'edition_code',
        'original_date', 'call_number','edition_image', 'updated_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\ArticleEdition');
    }


}
