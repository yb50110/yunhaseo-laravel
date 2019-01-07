<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show()
    {
        $projects = DB::table('projects')->all();

        return view('projects', compact('projects'));
    }
}
