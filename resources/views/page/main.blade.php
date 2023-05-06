@extends('app')

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="/">Тут название</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="">Изменить физические возможности</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="">Просмотреть материал для восстановления</a>--}}
{{--                    </li>--}}
                </ul>
                <div class="d-flex dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                       data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

    <div style="margin-top:80px">
        @yield('page')
    </div>
@endsection
