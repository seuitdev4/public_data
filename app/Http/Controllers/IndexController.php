<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $faculties = [];
        $semester = [];
        $gender = [];
        return view('public_data.index', compact('faculties', 'semester', 'gender'));
    }
}
