<?php

namespace App\Imports;

use Auth;
use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        return new ArticleEdition([
            'user_id' => Auth::user()->id,
            'edition_title_id' => $this->id,
            'article_title' => $row[0],
            'subject' => $row[1],
            'writer' => $row[2],
            'pages' => $row[3],
            'column' => $row[4],
            'source' => $row[5],
            'desc' => $row[6],
            'keyword'=> $row[7],
            'detail_img' => $row[8]
        ]);
    }
}
