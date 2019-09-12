<?php

namespace App\Exports;

use App\Models\ArticleEdition;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
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
