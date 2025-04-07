@extends ('layouts.master')

@section ('title', "MyProjects")
@section ('content')
<div class="container">
    <div class="d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-4">I miei Progetti</h1>
        <a href="{{ route('projects.create')}}" class="btn btn-primary mb-5">Aggiungi progetto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome Progetto</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data inizio</th>
                <th scope="col">Data fine</th>
                <th scope="col">Tipo</th>
                <th scope="col">Dettagli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->nome }}</td>
                <td>{{ $project->cliente }}</td>
                <td>{{ $project->data_inizio }}</td>
                <td>{{ $project->data_fine }}</td>
                <td>{{ $project->type->nome }}</td>
                <td><a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary">Dettagli</a></td>
                <td><a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-warning">Modifica</a></td>
                <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#{{ $project->id }}">Elimina</button></td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina definitivamente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Sei sicuro di voler eliminare questo progetto {{ $project->nome }}?<br>Questa azione non può
                            essere
                            annullata.</div>
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
            @endforeach
        </tbody>
    </table>
</div>
@endsection