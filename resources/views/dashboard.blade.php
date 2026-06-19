@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<h1 class="mb-4">

    Dashboard do Sistema

</h1>

<div class="row">

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h5>Total de Pets</h5>

                <h2>{{ \App\Models\Pet::count() }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h5>Total de Atendimentos</h5>

                <h2>{{ \App\Models\Atendimento::count() }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card text-center shadow">

            <div class="card-body">

                <h5>Usuário Logado</h5>

                <h6>{{ Auth::user()->name }}</h6>

            </div>

        </div>

    </div>

</div>

@endsection