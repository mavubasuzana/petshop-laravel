@extends('layouts.main')

@section('title', 'Cadastrar Pet')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Cadastrar Pet</h1>

    <a href="/pets" class="btn btn-secondary">
        Voltar
    </a>

</div>

<div class="card">

    <div class="card-body">

        <form
            action="/pets"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nome
                </label>

                <input
                    type="text"
                    name="nome"
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
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Imagem
                </label>

                <input
                    type="file"
                    name="imagem"
                    class="form-control">

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Salvar

            </button>

        </form>

    </div>

</div>

@endsection