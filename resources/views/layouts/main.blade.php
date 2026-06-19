<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- força atualização do CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="{{ route('pets.index') }}">
                🐾 PetShop
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pets.index') }}">
                            Pets
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('atendimentos.index') }}">
                            Atendimentos
                        </a>
                    </li>

                    @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pets.create') }}">
                                Novo Pet
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('atendimentos.create') }}">
                                Novo Atendimento
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-link nav-link text-decoration-none">

                                    Sair

                                </button>

                            </form>

                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Entrar
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                Registrar
                            </a>
                        </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>

    <div class="container mt-4">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>