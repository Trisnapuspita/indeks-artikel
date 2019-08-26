<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleEdition extends Model
{
    protected $fillable = [
        'user_id', 'edition_title_id', 'article_title', 'writer', 'pages', 'column', 'source', 'desc',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function edition_title()
    {
        return $this->belongsTo('App\Models\EditionTitle');
    }

}
