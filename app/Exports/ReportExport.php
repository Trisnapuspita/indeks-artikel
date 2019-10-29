<?php

namespace App\Exports;

use App\Models\ArticleEdition;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function collection()
    {
        return ArticleEdition::select('article_title', 'writer', 'source', 'desc', 'keyword')->get();
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Pengarang',
            'Sumber',
            'Deskripsi Singkat',
            'Kata Kunci',
        ];
    }
}
