<?php

namespace App\Imports;

use App\Models\Faculty;
use App\Models\FacultyDepartment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FacultyDepartmentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $faculty = Faculty::where('code', $row['faculty_code'])->first();
        $separtment = FacultyDepartment::updateOrCreate(
            ['code' => $row['code']],
            ['faculty_id' => $faculty->id]
        );

        $separtment->translateOrNew('en')->title = $row['english_title'];
        $separtment->translateOrNew('ar')->title = $row['arabic_title'];
        $separtment->save();
    }
}
