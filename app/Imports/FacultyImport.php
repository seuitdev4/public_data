<?php

namespace App\Imports;

use App\Models\Faculty;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacultyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $faculty = Faculty::updateOrCreate(
            ['code' => $row['code']],
            ['code' => $row['code']]
        );

        $faculty->translateOrNew('en')->title = $row['english_title'];
        $faculty->translateOrNew('ar')->title = $row['arabic_title'];
        $faculty->save();
    }
}
