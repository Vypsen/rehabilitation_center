@extends('app.header')

@section('app')
    <div class="row d-flex justify-content-center">
        <div class="col-xxl-2 col-md-3 menu-user">
            <div class="card position-fixed">
                <div class="card-body">
                    <nav class="nav flex-column" style="font-size: 15px;">
                        <a class="nav-link my" href="/my"><i class="fa-solid fa-user me-2"></i>Общая
                            информация</a>
                        <a class="nav-link active patient" href="/patient"><i class="fa-sharp fa-solid fa-hospital-user me-2"></i>Первичный
                            осмотр</a>
                        <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-person-cane me-2"></i>Спец.
                            данные</a>
                        <a class="nav-link" href="#"><i class="fa-solid fa-person-running me-2"></i>Навыки пациента</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-5">
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
    </style>
    <script>
        $(document).ready(function () {
            let path = window.location.pathname;
            path = path.replace('/', '.');
            $(".menu-user " + path).css('color', '#0a58ca');
        })
    </script>
@endsection
