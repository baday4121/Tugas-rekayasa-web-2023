<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        if ($perPage > 100) {
            $perPage = 100;
        }

        $search = $request->input('search');

        $query = Project::latest();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('technology', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%');
            });
        }

        $projects = $query->paginate($perPage)->appends([
            'per_page' => $perPage,
            'search' => $search
        ]);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'technology' => 'required|string|max:255',
            'status' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('images/projects');
            
            try {
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }
                $image->move($destinationPath, $imageName);
            } catch (\Exception $e) {

            }
        }

        Project::create([
            'title' => $request->title,
            'technology' => $request->technology,
            'status' => $request->status,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect('/admin/projects')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'technology' => 'required|string|max:255',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $imageName = $project->image;
        if ($request->hasFile('image')) {

            try {
                if ($project->image && File::exists(public_path('images/projects/' . $project->image))) {
                    File::delete(public_path('images/projects/' . $project->image));
                }
            } catch (\Exception $e) {
                
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('images/projects');
            
            
            try {
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }
                $image->move($destinationPath, $imageName);
            } catch (\Exception $e) {
                
            }
        }

        $project->update([
            'title' => $request->title,
            'technology' => $request->technology,
            'status' => $request->status,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect('/admin/projects')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        
        try {
            if ($project->image && File::exists(public_path('images/projects/' . $project->image))) {
                File::delete(public_path('images/projects/' . $project->image));
            }
        } catch (\Exception $e) {
            
        }
        
        $project->delete();
        return redirect('/admin/projects')->with('success', 'Project berhasil dihapus!');
    }

    public function cetakPdf()
    {
        $projects = Project::all(); 
        $pdf = Pdf::loadView('admin.projects.pdf', compact('projects'));
        return $pdf->stream('projects.pdf');
    }
}