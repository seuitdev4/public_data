<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            ['arabic_title' => 'البكالوريوس', 'english_title' => "Bachelors", 'code' => 'UG'],
            ['arabic_title' => 'الماجستير', 'english_title' =>'Masters', 'code' => 'GR'],
            ['arabic_title' => 'الدبلوم', 'english_title' =>'Diploma', 'code' => 'UD'],
        ];
        foreach ($levels as $level) {
            $studentLevel = Level::updateOrCreate(
                ['code' => $level['code']],
            );
            $studentLevel->translateOrNew('en')->title = $level['english_title'];
            $studentLevel->translateOrNew('ar')->title = $level['arabic_title'];
            $studentLevel->save();
        }
    }
}
