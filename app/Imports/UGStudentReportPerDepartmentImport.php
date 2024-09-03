<?php

namespace App\Imports;

use App\Models\FacultyDepartment;
use App\Models\Level;
use App\Models\StudentReportPerDepartment;
use App\Models\StudyTerm;
use App\Models\StudyYear;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UGStudentReportPerDepartmentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $studentsDepartmentReport)
    {
        $studyYear = StudyYear::whereTranslationLike('title', "%" . $studentsDepartmentReport['years'] . "%")->first();
        $studyTerm = StudyTerm::whereTranslationLike('title', "%" . $studentsDepartmentReport['semester'] . "%")
            ->where('study_year_id', $studyYear->id)->first();

        foreach ($studentsDepartmentReport as $key => $row) {
            $gender = '';
            if (strpos($key, '_female') !== false) {
                $departmentName = str_replace('_female', '', $key);
                $departmentName = str_replace('_', ' ', $departmentName);
                $gender = 'female';
            } elseif (strpos($key, '_male')!== false) {
                $departmentName = str_replace('_male', '', $key);
                $departmentName = str_replace('_', ' ', $departmentName);
                $gender = 'male';
            } else {
                continue;
            }
            if (strpos($key, 'e_commerce') >= 0 ) {
                $departmentName = 'E-commerce';
            }
            $facultyDepartment = FacultyDepartment::whereTranslationLike('title', "%" . $departmentName . "%")->first();
            $studentsReport = StudentReportPerDepartment::updateOrCreate([
                'gender' => $gender,
                'student_level' => Level::where('code', 'UG')->first()->id,
                'count' => (int)$row,
                'faculty_department_id' => $facultyDepartment->id,
                'faculty_id' => $facultyDepartment->faculty_id,
                'study_year_id' => $studyYear->id,
                'study_term_id' => $studyTerm->id
            ]);
        }
    }
}
