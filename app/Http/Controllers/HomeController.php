<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show()
    {
        $projects = Project::where('visible', true)->orderBy('year','DESC')->get();
        $categories = Category::all();

        $project_years = $projects->map(function ($project) {
            return $project->year;
        })->unique();

        return view('home', compact('project_years', 'projects', 'categories'));
    }

    public function ajaxGetProject(int $id)
    {
        $project = Project::with('categories')->find($id);
        return $project;
    }
}
