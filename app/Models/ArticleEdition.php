<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleEdition extends Model
{
    protected $fillable = [
        'user_id', 'edition_title_id', 'article_title', 'subject',
         'writer', 'pages', 'column', 'source', 'desc', 'keyword', 'detail_img', 'updated_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function edition_title()
    {
        return $this->belongsTo('App\Models\EditionTitle');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Models\Status');
    }

}
