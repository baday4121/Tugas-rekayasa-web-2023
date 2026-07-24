<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(6);

        return view('pages.projects', compact('projects'));
    }

    public function show($id)
    {

        $project = Project::findOrFail($id);
        
        return view('pages.project-detail', compact('project'));
    }
}