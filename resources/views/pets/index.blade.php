@extends('layouts.main')

@section('title', 'Lista de Pets')

@section('content')

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Lista de Pets</h1>

    <a href="/pets/create" class="btn btn-primary">
        Novo Pet
    </a>

</div>

@if(count($pets) > 0)

    <div class="row">

        @foreach($pets as $pet)

            <div class="col-md-4 mb-4">

                <div class="card card-pet h-100">

                    @if($pet->imagem)

                        <img
                            src="{{ asset('img/pets/'.$pet->imagem) }}"
                            class="card-img-top pet-image"
                            alt="{{ $pet->nome }}">

                    @endif

                    <div class="card-body">

                        <h5 class="card-title">

                            {{ $pet->nome }}

                        </h5>

                        <p class="card-text">

                            <strong>Espécie:</strong>
                            {{ $pet->especie }}

                        </p>

                        <p class="card-text">

                            <strong>Raça:</strong>
                            {{ $pet->raca }}

                        </p>

                        <p class="card-text">

                            <strong>Idade:</strong>
                            {{ $pet->idade }}

                        </p>

                        <p class="card-text">

                            <strong>Tutor:</strong>
                            {{ $pet->tutor }}

                        </p>

                    </div>

                    <div class="card-footer">

                        <a
                            href="/pets/{{ $pet->id }}"
                            class="btn btn-success btn-sm">

                            Ver

                        </a>

                        <a
                            href="/pets/{{ $pet->id }}/edit"
                            class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form
                            action="/pets/{{ $pet->id }}"
                            method="POST"
                            class="form-delete d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm">

                                Excluir

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="alert alert-info">

        Nenhum pet cadastrado.

    </div>

@endif

</div>

@endsection
