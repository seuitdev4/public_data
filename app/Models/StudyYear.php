<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class StudyYear extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'study_years';
    public array $translatedAttributes = ['title'];

}
