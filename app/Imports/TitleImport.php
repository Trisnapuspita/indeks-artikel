<?php

namespace App\Imports;

use Auth;
use App\Models\Title;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TitleImport implements ToModel, WithHeadingRow
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
            'title' => $row['judul'],
            'slug' => $row['judul'],
            'city' => $row['tempat_terbit'],
            'publisher' => $row['penerbit'],
            'year' => $row['tahun'],
            'first_year' => $row['tahun_terbit_pertama'],
        ]);
    }
}
