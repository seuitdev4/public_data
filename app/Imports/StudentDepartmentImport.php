<?php

namespace App\Imports;

use App\Models\StudentReportPerDepartment;
use App\Models\StudyTerm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentDepartmentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $studentReport = StudentReportPerDepartment::updateOrCreate([]);
    }
}
