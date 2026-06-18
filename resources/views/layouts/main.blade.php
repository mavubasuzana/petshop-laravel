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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="/pets">
                PetShop
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
                        <a class="nav-link" href="/pets">
                            Pets
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pets/create">
                            Novo Pet
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/atendimentos">
                            Atendimentos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/atendimentos/create">
                            Novo Atendimento
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div class="container mt-4">

        @yield('content')

    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>