@extends('layouts.master')

@section('title', 'Nuovo Progetto')
@section('content')
<div class="container">
    <!-- Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Progetti</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.show', $project) }}">Dettagli</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifica</li>
        </ol>
    </nav>
    <!-- Form -->
    <h1 class="text-center mt-5">Modifica il tuo progetto</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row row-cols-2 mt-4">
            <div class="mb-3 col ps-0">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $project->nome }}">
            </div>
            <div class="mb-3 col ps-0">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" class="form-control" value="{{ $project->cliente }}">
            </div>
            <div class="mb-3 col ps-0">
                <label for="data_inizio" class="form-label">Data inizio</label>
                <input type="date" name="data_inizio" id="data_inizio" class="form-control"
                    value="{{ $project->data_inizio }}">
            </div>
            <div class="mb-3 col ps-0">
                <label for="data_fine" class="form-label">Data fine</label>
                <input type="date" name="data_fine" id="data_fine" class="form-control"
                    value="{{ $project->data_fine }}">
            </div>
            <!-- Types -->
            <div class="mb-3 col ps-0">
                <label for="type_id" class="form-label">Tipo</label>
                <select class="form-select" name="type_id" id="type_id" aria-label="Default select example">
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col ps-0">
                <label for="riassunto" class="form-label">Riassunto</label>
                <textarea type="text" name="riassunto" id="riassunto"
                    class="form-control">{{ $project->riassunto }}</textarea>
            </div>
            <!-- Technologies -->
            <p class="form-label">Technologies</p>
            <div class="form-control mb-4 col d-flex justify-content-around">
                @foreach($technologies as $technology)
                <div>
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                        id="technology-{{ $technology->id }}"
                        {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                    <label class="form-label mt-2"
                        for="technology-{{ $technology->id }}">{{ $technology->nome }}</label>
                </div>
                @endforeach
            </div>
            <!-- Image -->
            <div class="mb-3 col d-flex form-control gap-3 align-items-center">
                <label for="img" class="form-label mb-0">Immagine</label>
                <input type="file" name="image_url" id="img" class="form-control">
                @if($project->image_url)
                <img src="{{ asset('storage/' . $project->image_url) }}" class="img-fluid rounded-start"
                    alt="{{ $project->nome }}" style="max-width: 40px">
                @endif
            </div>
            <!-- Submit -->
            <div class="ps-0">
                <button class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
</div>
@endsection