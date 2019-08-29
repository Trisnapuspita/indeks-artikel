<?php

namespace App\Imports;

use App\Models\EditionTitle;
use Maatwebsite\Excel\Concerns\ToModel;

class EditionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EditionTitle([
            'user_id' => Auth::user()->id,
            'title_id' => $row[1],
            'edition_year' => $row[2],
            'edition_title' => $row[3],
            'slug' => $row[4],
            'volume' => $row[5],
            'chapter' => $row[6],
            'edition_no' => $row[7],
            'publish_date' => $row[8],
            'publish_month' => $row[9],
            'publish_year' => $row[10],
            'original_date' => $row[11],
            'call_number' => $row[12],
            'publish_date' => $row[13]
        ]);
    }
}
