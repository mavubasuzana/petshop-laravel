@extends('layouts.main')

@section('title', $pet->nome)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Ficha do Pet</h1>

    <a
        href="{{ route('pets.index') }}"
        class="btn btn-secondary">

        Voltar

    </a>

</div>

<div class="row">

    <div class="col-md-4">

        @if($pet->imagem)

            <img
                src="{{ asset('img/pets/'.$pet->imagem) }}"
                class="img-fluid rounded shadow">

        @endif

    </div>

    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <h2>{{ $pet->nome }}</h2>

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

            </div>

        </div>

    </div>

</div>

<hr class="my-4">

<h3>Atendimentos Vinculados</h3>

@if(count($pet->atendimentos) > 0)

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>Serviço</th>
            <th>Status</th>
            <th>Data</th>
            <th>Operador</th>

        </tr>

    </thead>

    <tbody>

        @foreach($pet->atendimentos as $atendimento)

        <tr>

            <td>

                <a
                    href="{{ route('atendimentos.show', $atendimento->id) }}">

                    {{ $atendimento->servico }}

                </a>

            </td>

            <td>

                @if($atendimento->status == 'Agendado')

                    <span class="badge bg-warning text-dark">
                        Agendado
                    </span>

                @elseif($atendimento->status == 'Em andamento')

                    <span class="badge bg-primary">
                        Em andamento
                    </span>

                @elseif($atendimento->status == 'Concluído')

                    <span class="badge bg-success">
                        Concluído
                    </span>

                @elseif($atendimento->status == 'Cancelado')

                    <span class="badge bg-danger">
                        Cancelado
                    </span>

                @endif

            </td>

            <td>{{ $atendimento->data_atendimento }}</td>

            <td>{{ $atendimento->operador }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@else

<div class="alert alert-info">

    Nenhum atendimento registrado para este pet.

</div>

@endif

@endsection