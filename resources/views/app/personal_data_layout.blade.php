@extends('app.header')

@section('app')

    <div>
        <div class="container-fluid row col-xxl-9 col-md-10 justify-content-center mx-auto">
            @auth('patient')
                <h5 class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    <div>
                        Не забывайте вносить изменения в личный кабинет
                    </div>
                </h5>
            @endauth
            <div class="col-xxl-3 col-md-4 col-sm-12 fs-5">
                <div class="card position-fixed">
                    <div class="card-body pe-5">
                        <nav class="nav flex-column menu-user">
                            <a class="nav-link {{ Request::url() == route('my') ? 'active' : '' }}" href="/my">
                                <i class="fa-solid fa-user me-2"></i>Общая информация
                            </a>
                            @auth('patient')
                                <a class="nav-link {{ Request::url() == route('patient') ? 'active' : '' }}" href="/patient">
                                    <i class="fa-sharp fa-solid fa-hospital-user me-2"></i>Первичный осмотр
                                </a>
                                <a class="nav-link {{ Request::url() == route('tracked-patient-data') ? 'active' : '' }}" href="/tracked-patient-data">
                                    <i class="fa-sharp fa-solid fa-person-cane me-2"></i>Спец.данные
                                </a>
                                <a class="nav-link {{ Request::url() == route('skills') ? 'active' : '' }}" href="/skills">
                                    <i class="fa-solid fa-person-running me-2"></i>Мои навыки
                                </a>
                            @endauth
                            @auth('admin')
                                <a class="nav-link {{ Request::url() == route('create-doctor') ? 'active' : '' }}" href="{{route('create-doctor')}}">
                                    <i class="fa-solid fa-user-doctor me-2"></i>Создать доктора
                                </a>
                                <a class="nav-link {{ Request::url() == route('create-admin') ? 'active' : '' }}" href="{{route('create-admin')}}">
                                    <i class="fa-solid fa-user-plus me-1"></i>Создать админа
                                </a>
                                <a class="nav-link {{ Request::url() == route('search-admins') ? 'active' : '' }}" href="{{route('search-admins')}}">
                                    <i class="fa-solid fa-user-gear me-1"></i>Админы
                                </a>
                                <a class="nav-link {{ Request::url() == route('search-patients') ? 'active' : '' }}" href="{{route('search-patients')}}">
                                    <i class="fs-5 fa-solid fa-person-cane me-2"></i>Пациенты
                                </a>
                                <a class="nav-link {{ Request::url() == route('search-doctors') ? 'active' : '' }}" href="{{route('search-doctors')}}">
                                    <i class="fa-solid fa-user-doctor me-2"></i>Врачи
                                </a>
                            @endauth
                            @auth('doctor')
                                <a class="nav-link {{ Request::url() == route('search-patients') ? 'active' : '' }}" href="{{route('search-patients')}}">
                                    <i class="fs-5 fa-solid fa-person-cane me-2"></i>Пациенты
                                </a>
                                <a class="nav-link {{ Request::url() == route('search-doctors') ? 'active' : '' }}" href="{{route('search-doctors')}}">
                                    <i class="fa-solid fa-user-doctor me-2"></i>Врачи
                                </a>
                            @endauth
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @yield('info')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .menu-user a {
            color: #199c68;
        }

        .menu-user .active {
            color: #0a58ca
        }
    </style>
    <script>

    </script>
@endsection
