<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {

        // Prelevo i progetti dal database con collegamento types
        $projects = Project::with('type')->get();

        // Ritorno i dati in formato JSON
        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
    }

    public function show(Project $project) {
        // Prelevo il progetto dal database con collegamenti
        $project->load('type', 'technologies');

        // Ritorno i dati in formato JSON
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }
}
