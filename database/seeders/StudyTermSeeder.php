<?php

namespace Database\Seeders;

use App\Imports\StudyTermImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class StudyTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new StudyTermImport(), public_path('data_source/terms.xlsx'));

    }
}
