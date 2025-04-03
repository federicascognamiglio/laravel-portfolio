@extends('layouts.master')

@section('title', 'Nuovo Progetto')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Modifica il tuo progetto</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row row-cols-2 mt-4">
            <div class="mb-3 col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome"  class="form-control" value="{{ $project->nome }}">
            </div>
            <div class="mb-3 col">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente"  class="form-control" value="{{ $project->cliente }}">
            </div>
            <div class="mb-3 col">
                <label for="data_inizio" class="form-label">Data inizio</label>
                <input type="date" name="data_inizio" id="data_inizio"  class="form-control" value="{{ $project->data_inizio }}">
            </div>
            <div class="mb-3 col">
                <label for="data_fine" class="form-label">Data fine</label>
                <input type="date" name="data_fine" id="data_fine"  class="form-control" value="{{ $project->data_fine }}">
            </div>
            <div class="mb-3 col">
                <label for="riassunto" class="form-label">Riassunto</label>
                <textarea type="text" name="riassunto" id="riassunto"  class="form-control">{{ $project->riassunto }}</textarea>
            </div>
            <div class="m-auto">
                <button class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
</div>
@endsection