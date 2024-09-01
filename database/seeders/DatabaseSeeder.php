<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            FacultySeeder::class,
//            DepartmentSeeder::class,
//            LevelSeeder::class,
            StudyYearSeeder::class,
            StudyTermSeeder::class,
            StudentReportPerDepartmentSeeder::class,
        ]);
    }
}
