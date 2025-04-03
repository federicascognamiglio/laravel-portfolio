@extends('layouts.master')

@section('title', 'Nuovo Progetto')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Progetti</a></li>
            <li class="breadcrumb-item active" aria-current="page">Aggiungi progetto</li>
        </ol>
    </nav>
    <h1 class="text-center mt-5">Aggiungi un nuovo progetto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row row-cols-2 mt-4">
            <div class="mb-3 col">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="data_inizio" class="form-label">Data inizio</label>
                <input type="date" name="data_inizio" id="data_inizio" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="data_fine" class="form-label">Data fine</label>
                <input type="date" name="data_fine" id="data_fine" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="riassunto" class="form-label">Riassunto</label>
                <textarea type="text" name="riassunto" id="riassunto" class="form-control"></textarea>
            </div>
            <div class="m-auto">
                <button class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
</div>
@endsection