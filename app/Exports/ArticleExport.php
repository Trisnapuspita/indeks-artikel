<?php

namespace App\Exports;

use App\Models\Title;
use App\Models\EditionArticle;
use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ArticleExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $article = ArticleEdition::with(['edition_title'])->get();

        return $article->select('article_title', 'keyword', 'subject', 'column', 'writer', 
        'pages', 'source', 'edition_year', 'edition_no', 'original_date')->get();

        dd($article);
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Kata Kunci',
            'Subjek',
            'Kolom',
            'Pengarang',
            'Halaman',
            'Sumber',
            'Tahun Edisi',
            'No Edisi',
            'Tahun Terbit Asli',
        ];
    }
}
