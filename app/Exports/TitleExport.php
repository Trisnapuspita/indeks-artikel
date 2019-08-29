<?php

namespace App\Exports;

use App\Models\Title;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class TitleExport implements FromCollection
{
    public function collection()
    {
        return Title::select('id', 'title', 'city', 'publisher', 'year', 'first_year')->get();
    }
}
