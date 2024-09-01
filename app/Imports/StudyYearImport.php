<?php

namespace App\Imports;

use App\Models\StudyYear;
use Maatwebsite\Excel\Concerns\ToModel;

class StudyYearImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudyYear([
            //
        ]);
    }
}
