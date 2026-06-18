@extends('layouts.main')

@section('title', 'Atendimentos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">


<h1>Atendimentos</h1>

<a
    href="{{ route('atendimentos.create') }}"
    class="btn btn-primary">

    Novo Atendimento

</a>

</div>

@if(count($atendimentos) > 0)

<table class="table table-striped table-bordered">

<thead>

    <tr>
        <th>ID</th>
        <th>Pet</th>
        <th>Serviço</th>
        <th>Data</th>
        <th>Ações</th>
    </tr>

</thead>

<tbody>

    @foreach($atendimentos as $atendimento)

    <tr>

        <td>{{ $atendimento->id }}</td>

        <td>{{ $atendimento->pet->nome }}</td>

        <td>{{ $atendimento->servico }}</td>

        <td>{{ $atendimento->data_atendimento }}</td>

        <td>

            <a
                href="{{ route('atendimentos.edit', $atendimento->id) }}"
                class="btn btn-warning btn-sm">

                Editar

            </a>

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

        </td>

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
