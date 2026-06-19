@extends('layouts.main')

@section('title', 'Editar Atendimento')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h1>Editar Atendimento</h1>

    <a href="/atendimentos" class="btn btn-secondary">
        Voltar
    </a>

</div>

<div class="card">

    <div class="card-body">

        <form
            action="/atendimentos/{{ $atendimento->id }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Pet
                </label>

                <select
                    name="pet_id"
                    class="form-control"
                    required>

                    @foreach($pets as $pet)

                        <option
                            value="{{ $pet->id }}"
                            {{ $pet->id == $atendimento->pet_id ? 'selected' : '' }}>

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
                    value="{{ $atendimento->servico }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-control"
                    required>

                    <option
                        value="Agendado"
                        {{ $atendimento->status == 'Agendado' ? 'selected' : '' }}>

                        Agendado

                    </option>

                    <option
                        value="Em andamento"
                        {{ $atendimento->status == 'Em andamento' ? 'selected' : '' }}>

                        Em andamento

                    </option>

                    <option
                        value="Concluído"
                        {{ $atendimento->status == 'Concluído' ? 'selected' : '' }}>

                        Concluído

                    </option>

                    <option
                        value="Cancelado"
                        {{ $atendimento->status == 'Cancelado' ? 'selected' : '' }}>

                        Cancelado

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Data
                </label>

                <input
                    type="date"
                    name="data_atendimento"
                    value="{{ $atendimento->data_atendimento }}"
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
                    rows="4">{{ $atendimento->observacoes }}</textarea>

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