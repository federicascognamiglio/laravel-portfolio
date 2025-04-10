<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
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
        // Prelevo i dati dal database
        $types = Type::all();
        $technologies = Technology::all();

        // Ritorno la view e passo i tipi
        return view('projects.create', compact('types', 'technologies'));
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
        $newProject->type_id = $data['type_id'];
        $newProject->data_inizio = $data['data_inizio'];
        $newProject->data_fine = $data['data_fine'];
        $newProject->riassunto = $data['riassunto'];

        // Se l'utente ha caricato un'immagine, la salvo
        if(array_key_exists('image_url', $data)) {
            $img_path = Storage::putFile('uploads', $data['image_url']);
            $newProject->image_url = $img_path;
        }

        $newProject->save();

        // Controllo che l'array di technologies esista
        if($request->has('technologies')) {
            // Se esiste, aggiorno gli id delle technologies alla tabella ponte
            $newProject->technologies()->attach($data['technologies']);
        }

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
        // Prelevo i dati dal database
        $types = Type::all();
        $technologies = Technology::all();

        // Ritorno la view e passo i dati
        return view('projects.edit', compact('project', 'types', 'technologies'));
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
        $project->type_id = $data['type_id'];
        $project->data_inizio = $data['data_inizio'];
        $project->data_fine = $data['data_fine'];
        $project->riassunto = $data['riassunto'];

        // Se l'utente ha caricato un'immagine, la modifico
        if(array_key_exists('image_url', $data)) {
            // Se esiste, elimino quella precedente
            if($project->image_url) {
                Storage::delete($project->image_url);
            }
            // Salvo la nuova immagine
            $img_path = Storage::putFile('uploads', $data['image_url']);
            // Assegno il nuovo path all'immagine
            $project->image_url = $img_path;
        }

        // Salvo le modifiche
        $project->update();

        // Controllo che l'array di technologies esista
        if($request->has('technologies')) {
            // Se esiste, aggiorno gli id delle technologies alla tabella ponte
            $project->technologies()->sync($data['technologies']);
        } else {
            // Altrimenti, svuoto la tabella ponte
            $project->technologies()->detach();
        }

        // Restituisco la vista con il progetto aggiornato
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Controllo se il progetto ha delle tecnologie associate
        if($project->technologies()->count() > 0) {
            // Se ha delle tecnologie associate, le svuoto
            $project->technologies()->detach();
        }

        // Controllo se il progetto ha un'immagine
        if($project->image_url) {
            // Se ha un'immagine, la elimino
            Storage::delete($project->image_url);
        }

        // Elimino il progetto
        $project->delete();

        // Reindirizzo alla lista dei progetti
        return redirect()->route('projects.index');
    }
}
