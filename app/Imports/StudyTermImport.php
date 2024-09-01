<?php

namespace App\Imports;

use App\Models\Faculty;
use App\Models\FacultyDepartment;
use App\Models\StudyTerm;
use App\Models\StudyYear;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudyTermImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $year = StudyYear::whereTranslation('title', $row['year'])->first();
        if (!empty($year)) {
            $studyTerm = StudyTerm::updateOrCreate(
                ['code' => $row['code']],
                ['study_year_id' => $year->id]
            );
            $studyTerm->translateOrNew('en')->title = $row['english_title'];
            $studyTerm->translateOrNew('ar')->title = $row['arabic_title'];
            $studyTerm->save();
        }
    }
}
