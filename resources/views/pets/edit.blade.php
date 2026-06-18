@extends('layouts.main')

@section('title', 'Editar Pet')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Editar Pet</h1>

    <a href="/pets" class="btn btn-secondary">
        Voltar
    </a>

</div>

<div class="card">

    <div class="card-body">

        <form
            action="/pets/{{ $pet->id }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nome
                </label>

                <input
                    type="text"
                    name="nome"
                    value="{{ $pet->nome }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Espécie
                </label>

                <input
                    type="text"
                    name="especie"
                    value="{{ $pet->especie }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Raça
                </label>

                <input
                    type="text"
                    name="raca"
                    value="{{ $pet->raca }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Idade
                </label>

                <input
                    type="number"
                    name="idade"
                    value="{{ $pet->idade }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Tutor
                </label>

                <input
                    type="text"
                    name="tutor"
                    value="{{ $pet->tutor }}"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Atualizar

            </button>

        </form>

    </div>

</div>

@endsection