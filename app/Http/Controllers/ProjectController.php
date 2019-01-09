<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects', compact('projects'));
    }

    public function show(Project $project)
    {
        $prev_project = Project::where('id', '<', $project->id)
            ->orderBy('id','desc')
            ->first();
        $next_project = Project::where('id', '>', $project->id)
            ->orderBy('id')
            ->first();

        return view('projects-show', compact('project', 'prev_project', 'next_project'));
    }
}
