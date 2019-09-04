<?php

namespace App\Imports;

use Auth;
use App\Models\Title;
use Maatwebsite\Excel\Concerns\ToModel;

class TitleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Title([
            'user_id' => Auth::user()->id,
            'title' => $row[0],
            'slug' => $row[0],
            'city' => $row[1],
            'publisher' => $row[2],
            'year' => $row[3],
            'first_year' => $row[4],
        ]);
    }
}
