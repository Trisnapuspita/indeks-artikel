<?php

namespace App\Exports;

use App\Models\Title;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TitleExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Title::select('title', 'city', 'publisher', 'year', 'first_year')->get();
    }

    public function headings(): array
    {
        return [
            'Judul',
            'Tempat terbit',
            'Penerbit',
            'Tahun',
            'Tahun terbit pertama',
        ];
    }
}
