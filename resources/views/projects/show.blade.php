@extends ('layouts.master')

@section ('title', $project->nome)
@section ('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Progetti</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dettagli</li>
        </ol>
    </nav>

    <div class="d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-3">{{ $project->nome }}</h1>
        <p>Cliente: {{ $project->cliente }}</p>
        <p><small>{{ $project->data_inizio }} - {{ $project->data_fine }}</small></p>
        <p>{{ $project->riassunto }}</p>
        <div class="d-flex column-gap-3 mt-5">
            <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>
            <a class="btn btn-outline-danger" href="{{ route('projects.destroy', $project) }}">Elimina</a>
            <a class="btn btn-outline-primary" href="{{ route('projects.index') }}">Torna ai progetti</a>
        </div>
    </div>
</div>
@endsection