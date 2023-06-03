@extends('app.header')

@section('app')
    <div class="row col-xxl-8 col-md-9 justify-content-center mx-auto">
        <h5 class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            <div>
                Не забывайте вносить изменения в личный кабинет
            </div>
        </h5>
        <div class="col-xxl-3 col-md-3">
            <div class="card position-fixed">
                <div class="card-body">
                    <nav class="nav flex-column menu-user" style="font-size: 15px;">
                        <a class="nav-link {{ Request::url() == route('my') ? 'active' : '' }}" href="/my"><i
                                class="fa-solid fa-user me-2"></i>Общая
                            информация</a>
                        <a class="nav-link {{ Request::url() == route('patient') ? 'active' : '' }}" href="/patient"><i
                                class="fa-sharp fa-solid fa-hospital-user me-2"></i>Первичный
                            осмотр</a>
                        <a class="nav-link {{ Request::url() == route('tracked-patient-data') ? 'active' : '' }}"
                           href="/tracked-patient-data"><i style="font-size: 17px;"
                                                           class="fa-sharp fa-solid fa-person-cane me-2"></i>Спец.данные</a>
                        <a class="nav-link {{ Request::url() == route('skills') ? 'active' : '' }}" href="/skills"><i
                                class="fa-solid fa-person-running me-2"></i>Навыки пациента</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xxl-9 col-md-9">
            <div class="card">
                <div class="card-body">
                    @yield('info')
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
        // $(document).ready(function () {
        //     let path = window.location.pathname;
        //     path = path.replace('/', '.');
        //     $(".menu-user " + path).css('color', '#0a58ca');
        // })
    </script>
@endsection
