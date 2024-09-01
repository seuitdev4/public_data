<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Faculty extends Model implements TranslatableContract
{
    use Translatable;

    public array $translatedAttributes = ['title'];
    protected $translationForeignKey = 'faculty_id';


    // other model code
}
