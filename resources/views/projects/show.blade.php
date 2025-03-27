@extends ('layouts.master')

@section ('title', $project->nome)
@section ('content')
<div class="container">
    <h1 class="text-center mt-5 mb-3">{{ $project->nome }}</h1>
    <p class="text-center">Cliente: {{ $project->cliente }}</p>
    <p class="text-center"><small>{{ $project->data_inizio }} - {{ $project->data_fine }}</small></p>
    <p class="text-center">{{ $project->riassunto }}</p>
</div>
@endsection