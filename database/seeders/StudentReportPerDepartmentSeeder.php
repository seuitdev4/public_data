<?php

namespace Database\Seeders;

use App\Imports\BUStudentReportPerDepartmentImport;
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
        $buStudentReportPerDepartment = [
            ['department_id' => 1, 'year' => '1439-1440', 'type' => 'male', 'number' => '619', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1439-1440', 'type' => 'female', 'number' => '527', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1439-1440', 'type' => 'male', 'number' => '761', 'term' => 'second semester'],
            ['department_id' => 1, 'year' => '1439-1440', 'type' => 'female', 'number' => '637', 'term' => 'second semester'],

            ['department_id' => 1, 'year' => '1440-1441', 'type' => 'male', 'number' => '885', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1440-1441', 'type' => 'female', 'number' => '769', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1440-1441', 'type' => 'male', 'number' => '874', 'term' => 'second semester'],
            ['department_id' => 1, 'year' => '1440-1441', 'type' => 'female', 'number' => '768', 'term' => 'second semester'],

            ['department_id' => 1, 'year' => '1441-1442', 'type' => 'male', 'number' => '1134', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1441-1442', 'type' => 'female', 'number' => '1260', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1441-1442', 'type' => 'male', 'number' => '890', 'term' => 'second semester'],
            ['department_id' => 1, 'year' => '1441-1442', 'type' => 'female', 'number' => '779', 'term' => 'second semester'],


            ['department_id' => 1, 'year' => '1443', 'type' => 'male', 'number' => '1088', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1443', 'type' => 'female', 'number' => '1207', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1443', 'type' => 'male', 'number' => '831', 'term' => 'second semester'],
            ['department_id' => 1, 'year' => '1443', 'type' => 'female', 'number' => '1129', 'term' => 'second semester'],

            ['department_id' => 1, 'year' => '1444', 'type' => 'male', 'number' => '1088', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1444', 'type' => 'female', 'number' => '1207', 'term' => 'first semester'],
            ['department_id' => 1, 'year' => '1444', 'type' => 'male', 'number' => '831', 'term' => 'second semester'],
            ['department_id' => 1, 'year' => '1444', 'type' => 'female', 'number' => '1129', 'term' => 'second semester'],
            ];
        Excel::import(new BUStudentReportPerDepartmentImport(), public_path('data_source/students_accounting.xlsx'));

    }
}
