<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Level;
use App\Models\StudyTerm;
use App\Models\StudyYear;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        $semesters = StudyTerm::all();
        $years = StudyYear::all();
        $levels = Level::all();
        $genders = ['male', 'female'];

        return view('public_data.index', compact(
            'levels',
            'faculties',
            'semesters',
            'genders',
            'years'
        ));
    }
}
