@extends('layouts.main')

@section('title', $pet->nome)

@section('content')

<div class="row">

    <div class="col-md-4">

        @if($pet->imagem)

            <img
                src="{{ asset('img/pets/'.$pet->imagem) }}"
                class="img-fluid rounded">

        @endif

    </div>

    <div class="col-md-8">

        <h1>{{ $pet->nome }}</h1>

        <hr>

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

        <hr>

        <h3>Atendimentos</h3>

        @if(count($pet->atendimentos) > 0)

            <ul>

                @foreach($pet->atendimentos as $atendimento)

                    <li>

                        {{ $atendimento->servico }}
                        -
                        {{ $atendimento->data_atendimento }}

                    </li>

                @endforeach

            </ul>

        @else

            <p>

                Nenhum atendimento registrado.

            </p>

        @endif

    </div>

</div>

@endsection