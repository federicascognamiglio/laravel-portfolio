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
                <th scope="col">Riassunto</th>
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
                <td>{{ $project->riassunto }}</td>
                <td><a href="{{ route('projects.show', $project) }}" class="btn btn-outline-primary">Dettagli</a></td>
                <td><a href="{{ route('projects.edit', $project) }}" class="btn btn-outline-warning">Modifica</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection