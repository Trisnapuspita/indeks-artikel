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

    public function __construct(int $id)
    {
        $this->id = $id;

        $data = DB::table('article_editions')
                ->join('edition_titles', 'article_editions.id', '=', 'edition_titles.id_article_editions')
                ->join('titles', 'article_editions.id', '=', 'titles.id_siswa')
                ->select('article_editions.nm_lengkap', 'edition_titles.nm_ayah', 'tb_ibu.nm_ibu')
                ->get();
    }

    public function collection()
    {
        return ArticleEdition::select('id', 'article_title', 'keyword', 'subject', 'column', 'writer', 
        'pages', 'edition_no', 'source')->where('edition_no',$this->id)->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Kata Kunci',
            'Subjek',
            'Kolom',
            'Pengarang',
            'Halaman',
            'Edisi',
            'Sumber'
        ];
    }
}
