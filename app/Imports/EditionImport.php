<?php

namespace App\Imports;

use Auth;
use App\Models\EditionTitle;
use Maatwebsite\Excel\Concerns\ToModel;

class EditionImport implements ToModel
{

    public function __construct(int $id)
    {
        $this->id = $id;
    }



    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EditionTitle([
            'user_id' => Auth::user()->id,
            'title_id' => $this->id,
            'edition_year' => $row[1],
            'edition_title' => $row[2],
            'slug' => $row[3],
            'volume' => $row[4],
            'chapter' => $row[5],
            'edition_no' => $row[6],
            'publish_date' => $row[7],
            'publish_month' => $row[8],
            'publish_year' => $row[9],
            'original_date' => $row[10],
            'call_number' => $row[11],
            'publish_date' => $row[12]
        ]);
    }
}
