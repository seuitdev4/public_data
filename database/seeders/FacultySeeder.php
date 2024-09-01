<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\FacultyImport;
use Maatwebsite\Excel\Facades\Excel;
class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new FacultyImport, public_path('data_source/faculty.xlsx'));
    }
}
