<?php

namespace App\Exports;

use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ArticleEdition::select('user_id', 'edition_title_id', 'article_title', 'subject', 'writer', 
        'pages', 'column', 'source', 'desc', 'keyword', 'detail_img')->get();
    }
}
