@extends('app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top flex-md-row" style="background-color: #17915d;">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">ЦИВЗ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <div class="d-flex dropdown">
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            </div>
                        </div>
                    </li>
                    @auth('patient')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('recover')}}">Материал для восстановления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('skills')}}">Мои навыки</a>
                        </li>
                    @endauth
                    @auth('doctor')
                        <li class="nav-item">
                            <div class="d-flex dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                   role="button"
                                   data-bs-toggle="dropdown"> Пользователи
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/doctors">Доктора</a>
                                    <a class="dropdown-item" href="/patients">Пациенты</a>
                                </div>
                            </div>
                        </li>
                    @endauth
                    @auth('admin')
                        <li class="nav-item">
                            <div class="d-flex dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                   role="button"
                                   data-bs-toggle="dropdown"> Пользователи
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/doctors">Доктора</a>
                                    <a class="dropdown-item" href="/patients">Пациенты</a>
                                </div>
                            </div>
                        </li>
                    @endauth
                </ul>
                <div class="d-flex dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/my">Профиль</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div style="background: -webkit-linear-gradient(90deg, rgb(147,232,179), rgb(107,222,152), rgb(90,204,135), rgb(77,182,117)) no-repeat;" class="min-vh-100">
        <div style="padding: 10vh 0;" class="container-fluid">
            @yield('app')
        </div>
    </div>
@endsection
