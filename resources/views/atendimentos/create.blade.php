@extends('layouts.main')

@section('title', 'Novo Atendimento')

@section('content')

<h1>Novo Atendimento</h1>

<form action="{{ route('atendimentos.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Pet
        </label>

        <select
            name="pet_id"
            class="form-control"
            required>

            @foreach($pets as $pet)

                <option value="{{ $pet->id }}">
                    {{ $pet->nome }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Serviço
        </label>

        <input
            type="text"
            name="servico"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Data
        </label>

        <input
            type="date"
            name="data_atendimento"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Observações
        </label>

        <textarea
            name="observacoes"
            class="form-control"
            rows="4"></textarea>

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Salvar

    </button>

</form>

@endsection