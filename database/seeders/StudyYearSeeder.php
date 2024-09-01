<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\StudyYear;
use Illuminate\Database\Seeder;

class StudyYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = [
            ['arabic_title' => '1440هـ -1439هـ', 'english_title' => "2018-2019", 'code' => '201820'],
            ['arabic_title' => '1441هـ -1440هـ', 'english_title' =>'2019-2020', 'code' => '201910'],
            ['arabic_title' => '1442هـ - 1441هـ', 'english_title' =>'2020-2021', 'code' => '202010'],
            ['arabic_title' => '1443هـ', 'english_title' =>'2021-2022', 'code' => '202110'],
            ['arabic_title' => '1444هـ', 'english_title' =>'2022-2023', 'code' => '202230'],
            ['arabic_title' => '1445هـ', 'english_title' =>'2023-2024', 'code' => '202310'],
        ];
        foreach ($years as $year) {
            $studyYear = StudyYear::updateOrCreate(
                ['code' => $year['code']],
            );
            $studyYear->translateOrNew('en')->title = $year['english_title'];
            $studyYear->translateOrNew('ar')->title = $year['arabic_title'];
            $studyYear->save();
        }
    }
}
