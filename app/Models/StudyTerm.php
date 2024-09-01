<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StudyTerm extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'study_terms';
    public array $translatedAttributes = ['title'];

    public function studyYear()
    {
        return $this->belongsTo(StudyYear::class, 'study_year_id');
    }

}
