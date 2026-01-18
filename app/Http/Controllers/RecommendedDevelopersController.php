<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendedDevelopersController extends Controller
{
    public function index()
    {
        return view('recommended-developers');
    }
}
