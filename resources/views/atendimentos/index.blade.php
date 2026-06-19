@extends('layouts.main')

@section('title', 'Atendimentos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Atendimentos</h1>

    @auth
        <a
            href="{{ route('atendimentos.create') }}"
            class="btn btn-primary">

            Novo Atendimento

        </a>
    @endauth

</div>

@if(count($atendimentos) > 0)

<table class="table table-striped table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>Pet</th>
            <th>Serviço</th>
            <th>Status</th>
            <th>Operador</th>
            <th>Editor</th>
            <th>Data</th>

            @auth
                <th>Ações</th>
            @endauth

        </tr>

    </thead>

    <tbody>

        @foreach($atendimentos as $atendimento)

        <tr>

            <td>{{ $atendimento->id }}</td>

            <td>{{ $atendimento->pet->nome }}</td>

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

            <td>{{ $atendimento->operador }}</td>

            <td>{{ $atendimento->editor }}</td>

            <td>{{ $atendimento->data_atendimento }}</td>

            @auth

            <td>

                <a
                    href="{{ route('atendimentos.edit', $atendimento->id) }}"
                    class="btn btn-warning btn-sm">

                    Editar

                </a>

                @if($atendimento->operador == auth()->user()->name)

                    <form
                        action="{{ route('atendimentos.destroy', $atendimento->id) }}"
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

                @endif

            </td>

            @endauth

        </tr>

        @endforeach

    </tbody>

</table>

@else

<div class="alert alert-info">

    Nenhum atendimento cadastrado.

</div>

@endif

@endsection