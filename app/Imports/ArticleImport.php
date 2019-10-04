<?php

namespace App\Imports;

use Auth;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ArticleImport implements ToCollection
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

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
           
            Title::create([
                'user_id' => Auth::user()->id,
                'title_id' => $this->id,
                'edition_year'=> $row['Edisi']
            ]);

            EditionTitle::create([
                'user_id' => Auth::user()->id,
                'title_id' => $this->id,
                'edition_year'=> $row['Edisi']
            ]);

            ArticleEdition::create([
                'user_id' => Auth::user()->id,
                'article_title' => $row['Judul Artikel'],
                'keyword'=> $row['Kata Kunci'],
                'subject' => $row['Subjek'],
                'column' => $row['Kolom'],
                'writer' => $row['Pengarang'],
                'pages' => $row['Halaman'],
                'source' => $row['Sumber']
            ]);

        }
    }
    
}

