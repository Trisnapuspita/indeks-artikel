<?php

namespace App\Exports;

use App\Models\EditionTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EditionExportView implements FromView
{

    public function view(): View
    {   
        return view('titles.single',  [
            'title' => EditionTitle::all()
        ]);        
    }
}
