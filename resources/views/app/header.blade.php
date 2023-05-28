@extends('app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top flex-md-row" style="background-color: #199c68;">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">Тут название</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="d-flex dropdown">
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('mobility') }}">
                                    Первичный осмотр
                                </a>
                                <a class="dropdown-item" href="{{ route('mobility_list') }}">
                                    Просмотреть все изменение возможностей
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Просмотреть материал для восстановления</a>
                    </li>
                </ul>
                <div class="d-flex dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/my">Профиль</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <style>

    </style>

    <div style="margin: 12vh 0;" class="container-fluid">

        @yield('app')
    </div>
@endsection
