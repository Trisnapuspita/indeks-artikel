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

    public function model(array $row)
    {
        return new EditionTitle([
            'user_id' => Auth::user()->id,
            'title_id' => $this->id,
            'edition_year' => $row[0],
            'edition_title' => $row[1],
            'slug' => $row[5],
            'volume' => $row[2],
            'chapter' => $row[3],
            'edition_no' => $row[4],
            'publish_date' => $row[5],
            'publish_month' => $row[6],
            'publish_year' => $row[7],
            'original_date' => $row[8],
            'call_number' => $row[9]
        ]);
    }
}
