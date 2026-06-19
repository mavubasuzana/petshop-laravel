@extends('layouts.main')

@section('title', 'Detalhes do Atendimento')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Detalhes do Atendimento</h1>

    <a
        href="{{ route('atendimentos.index') }}"
        class="btn btn-secondary">

        Voltar

    </a>

</div>

<div class="card">

    <div class="card-body">

        <h3 class="mb-4">

            {{ $atendimento->servico }}

        </h3>

        <p>

            <strong>Pet:</strong>

            {{ $atendimento->pet->nome }}

        </p>

        <p>

            <strong>Status:</strong>

            {{ $atendimento->status }}

        </p>

        <p>

            <strong>Operador:</strong>

            {{ $atendimento->operador }}

        </p>

        <p>

            <strong>Editor:</strong>

            {{ $atendimento->editor }}

        </p>

        <p>

            <strong>Data:</strong>

            {{ $atendimento->data_atendimento }}

        </p>

        <p>

            <strong>Observações:</strong>

        </p>

        <div class="alert alert-light">

            {{ $atendimento->observacoes ?? 'Nenhuma observação registrada.' }}

        </div>

    </div>

</div>

@endsection