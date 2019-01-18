<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $projects = Project::where('featured', '=', '1')
            ->orderBy('id','desc')
            ->limit(2)
            ->get();

        return view('home', compact('projects'));
    }
}
