<?php

namespace App\Imports;

use App\Models\Faculty;
use App\Models\FacultyDepartment;
use App\Models\GraduatedStudentReport;
use App\Models\Level;
use App\Models\StudentReportPerDepartment;
use App\Models\StudyTerm;
use App\Models\StudyYear;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GraduatedStudentReportImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $graduatedStudent)
    {
        $facultyName = str_replace('College of ', '', $graduatedStudent['faculty']);
        $studyYear = StudyYear::whereTranslationLike('title', "%" . $graduatedStudent['year'] . "%")->first();
        $faculty = Faculty::whereTranslationLike('title', "%" . $facultyName . "%")->first();

        GraduatedStudentReport::updateOrCreate([
            'gender' => 'male',
            'count' => (int)$graduatedStudent['saudi_male'],
            'is_saudi' => 1,
            'faculty_id' => $faculty->id,
            'year_id' => $studyYear->id,
        ]);
        GraduatedStudentReport::updateOrCreate([
            'gender' => 'female',
            'count' => (int)$graduatedStudent['saudi_female'],
            'is_saudi' => 1,
            'faculty_id' => $faculty->id,
            'year_id' => $studyYear->id,
        ]);

        GraduatedStudentReport::updateOrCreate([
            'gender' => 'male',
            'count' => (int)$graduatedStudent['non_saudi_male'],
            'is_saudi' => 0,
            'faculty_id' => $faculty->id,
            'year_id' => $studyYear->id,
        ]);
        GraduatedStudentReport::updateOrCreate([
            'gender' => 'female',
            'count' => (int)$graduatedStudent['non_saudi_female'],
            'is_saudi' => 0,
            'faculty_id' => $faculty->id,
            'year_id' => $studyYear->id,
        ]);
    }
}
