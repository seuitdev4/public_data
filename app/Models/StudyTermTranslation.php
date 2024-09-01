<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StudyTermTranslation extends Model
{
    protected $table = 'study_terms_translation';
    protected $fillable = [];
}
