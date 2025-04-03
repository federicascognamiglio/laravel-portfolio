<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prelevo i progetti dal database
        $projects = Project::all();

        // Ritorno la view con i progetti e passo i dati
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Prelevo i dati dalla request
        $data=$request->all();

        // Creao una nuova istanza del progetto
        $newProject = new Project();
        
        // Assegno i valori ai campi del progetto
        $newProject->nome = $data['nome'];
        $newProject->cliente = $data['cliente'];
        $newProject->data_inizio = $data['data_inizio'];
        $newProject->data_fine = $data['data_fine'];
        $newProject->riassunto = $data['riassunto'];

        $newProject->save();

        // Restituisco la vista con il progetto creato
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Prelevo i dati dalla request
        $data = $request->all();

        // Riassegno i valori ai campi del progetto
        $project->nome = $data['nome'];
        $project->cliente = $data['cliente'];
        $project->data_inizio = $data['data_inizio'];
        $project->data_fine = $data['data_fine'];
        $project->riassunto = $data['riassunto'];

        // Salvo le modifiche
        $project->update();

        // Restituisco la vista con il progetto aggiornato
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Elimino il progetto
        $project->delete();

        // Reindirizzo alla lista dei progetti
        return redirect()->route('projects.index');
    }
}
