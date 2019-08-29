<?php

namespace App\Imports;

use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ArticleEdition([
            'user_id' => $row[0],
            'edition_title_id' => $row[1],
            'article_title' => $row[2],
            'subject' => $row[3],
            'writer' => $row[4],
            'pages' => $row[5],
            'column' => $row[6],
            'source' => $row[7],
            'desc' => $row[8],
            'keyword'=> $row[9],
            'detail_img' => $row[10]
        ]);
    }
}
