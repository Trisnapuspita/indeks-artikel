<?php

namespace App\Exports;

use App\Models\EditionTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class EditionExport implements FromCollection
{
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {   
        return EditionTitle::select('edition_year', 'edition_title', 'volume', 'chapter',
        'edition_no', 'publish_date', 'publish_month', 'publish_year', 'original_date', 'call_number')->where('title_id',$this->id)->get();        
    }
}
