<?php

namespace Database\Seeders;

use App\Imports\FacultyDepartmentImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new FacultyDepartmentImport(), public_path('data_source/departments.xlsx'));
    }
}
