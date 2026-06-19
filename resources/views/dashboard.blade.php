<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('pets.index') }}">

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

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('pets.index') }}">

                            Pets

                        </a>

                    </li>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('atendimentos.index') }}">

                            Atendimentos

                        </a>

                    </li>

                    @auth

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('dashboard') }}">

                                Dashboard

                            </a>

                        </li>

                    @endauth

                </ul>

                <ul class="navbar-nav">

                    @auth

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('pets.create') }}">

                                Novo Pet

                            </a>

                        </li>

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('atendimentos.create') }}">

                                Novo Atendimento

                            </a>

                        </li>

                        <li class="nav-item dropdown">

                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown">

                                👤 {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>

                                    <a
                                        class="dropdown-item"
                                        href="{{ route('profile.edit') }}">

                                        Meu Perfil

                                    </a>

                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>

                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="dropdown-item">

                                            Sair

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </li>

                    @else

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('login') }}">

                                Entrar

                            </a>

                        </li>

                        <li class="nav-item">

                            <a
                                class="nav-link"
                                href="{{ route('register') }}">

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

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

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