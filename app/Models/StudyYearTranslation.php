<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StudyYearTranslation extends Model
{
    protected $table = 'study_years_translation';
    protected $fillable = [];
}
