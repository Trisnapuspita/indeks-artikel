<?php

namespace App\Imports;

use Auth;
use App\Models\Title;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ArticleImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            if(Title::all->where('kode', kode)->count() > 0){
            } else {
                $title = Title::create([
                    'user_id' => Auth::user()->id,
                    'title' => $row['judul_sumber'],
                    'slug' => $row['judul_sumber'],
                    'kode' => $row['kode']
            ]);
            }

            if(Title::all->where('kode_edition', kode_edition)->count() > 0){
            } else {
                $edition = EditionTitle::create([
                'user_id' => Auth::user()->id,
                'title_id' => $title->id,
                'edition_year'=> $row['tahun_edisi'],
                'edition_no'=> $row['no_edisi'],
                'original_date'=> $row['tahun_terbit_asli'],
                'kode_edition' => $row['kode_edisi']
            ]);
            }

            ArticleEdition::create([
                'user_id' => Auth::user()->id,
                'edition_title_id' => $edition->id, 
                'article_title' => $row['judul'],
                'keyword'=> $row['kata_kunci'],
                'subject' => $row['subjek'],
                'column' => $row['kolom'],
                'writer' => $row['pengarang'],
                'pages' => $row['halaman'],
                'source' => $row['sumber']
            ]);

        }
    }
    
}

