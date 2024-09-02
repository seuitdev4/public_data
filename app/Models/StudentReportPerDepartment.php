<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReportPerDepartment extends Model
{
    use HasFactory;

    protected $table = 'student_department_reports';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function term()
    {
        return $this->belongsTo(StudyTerm::class, 'study_term_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'student_level');
    }

    public function facultyDepartment()
    {
        return $this->belongsTo(FacultyDepartment::class, 'faculty_department_id');
    }

    public function year()
    {
        return $this->belongsTo(StudyYear::class, 'study_year_id');
    }
}
