<?php

namespace Database\Seeders;

use App\Imports\UGStudentReportPerDepartmentImport;
use App\Imports\UDStudentReportPerDepartmentImport;
use App\Imports\GRStudentReportPerDepartmentImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class StudentReportPerDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new UGStudentReportPerDepartmentImport(), public_path('data_source/student_per_department_UG.xlsx'));
        Excel::import(new GRStudentReportPerDepartmentImport(), public_path('data_source/student_per_department_GR.xlsx'));
        Excel::import(new UDStudentReportPerDepartmentImport(), public_path('data_source/student_per_department_UD.xlsx'));
    }
}
