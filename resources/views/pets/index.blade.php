@extends('layouts.main')

@section('title', 'Lista de Pets')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Lista de Pets</h1>

        @auth
            <a href="{{ route('pets.create') }}" class="btn btn-primary">
                Novo Pet
            </a>
        @endauth

    </div>

    <form
        action="{{ route('pets.index') }}"
        method="GET"
        class="mb-4">

        <div class="input-group">

            <input
                type="text"
                name="busca"
                class="form-control"
                placeholder="Pesquisar pet pelo nome..."
                value="{{ $busca ?? '' }}">

            <button
                type="submit"
                class="btn btn-primary">

                Pesquisar

            </button>

        </div>

    </form>

    @if(count($pets) > 0)

        <div class="row">

            @foreach($pets as $pet)

                <div class="col-md-4 mb-4">

                    <div class="card card-pet h-100">

                        @if($pet->imagem)

                            <img
                                src="{{ asset('img/pets/' . $pet->imagem) }}"
                                class="card-img-top pet-image"
                                alt="{{ $pet->nome }}">

                        @endif

                        <div class="card-body">

                            <h5 class="card-title">
                                {{ $pet->nome }}
                            </h5>

                            <p>
                                <strong>Espécie:</strong>
                                {{ $pet->especie }}
                            </p>

                            <p>
                                <strong>Raça:</strong>
                                {{ $pet->raca }}
                            </p>

                            <p>
                                <strong>Idade:</strong>
                                {{ $pet->idade }}
                            </p>

                            <p>
                                <strong>Tutor:</strong>
                                {{ $pet->tutor }}
                            </p>

                        </div>

                        <div class="card-footer">

                            <a
                                href="{{ route('pets.show', $pet->id) }}"
                                class="btn btn-success btn-sm">

                                Ver

                            </a>

                            @auth

                                <a
                                    href="{{ route('pets.edit', $pet->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form
                                    action="{{ route('pets.destroy', $pet->id) }}"
                                    method="POST"
                                    class="d-inline form-delete">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm">

                                        Excluir

                                    </button>

                                </form>

                            @endauth

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">

            Nenhum pet encontrado.

        </div>

    @endif

</div>

@endsection

