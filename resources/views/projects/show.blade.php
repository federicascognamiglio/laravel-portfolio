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
            <a class="btn btn-outline-primary" href="{{ route('projects.index') }}">Torna ai progetti</a>
            <a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Modifica</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina definitivamente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Sei sicuro di voler eliminare questo progetto?<br>Questa azione non può essere annullata.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Elimina">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection