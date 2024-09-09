<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduatedStudentReport extends Model
{
    use HasFactory;

    protected $table = 'graduated_student_reports';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function year()
    {
        return $this->belongsTo(StudyYear::class, 'year_id');
    }
}
