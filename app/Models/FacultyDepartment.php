<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyDepartment extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public array $translatedAttributes = ['title'];
    protected $translationForeignKey = 'department_id';
}
