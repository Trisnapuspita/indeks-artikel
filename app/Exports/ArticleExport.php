<?php

namespace App\Exports;

use App\Models\Title;
use App\Models\EditionArticle;
use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArticleExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return ArticleEdition::all();

    }

    public function map($article): array
    {
        return 
        [
                $article->article_title,
                $article->keyword,
                $article->subject,
                $article->column,
                $article->writer,
                $article->pages,
                $article->source,
                $article->edition_title->edition_year,
                $article->edition_title->edition_no,
                $article->edition_title->original_date,
                $article->edition_title->title->title,
        ];
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
            'Judul Sumber'
        ];
    }
}
