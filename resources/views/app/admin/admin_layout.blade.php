@extends('app.header')

@section('app')
    <div class="row col-xxl-9 col-md-10 justify-content-center mx-auto">
        <div class="col-xxl-3 col-md-4 fs-5">
            <div class="card position-fixed">
                <div class="card-body pe-5">
                    <nav class="nav flex-column menu-user">
                        <a class="nav-link {{ Request::url() == route('admin/doctors') ? 'active' : '' }}" href="/admin/doctors"><i
                                class="fa-solid fa-user me-2"></i>Доктора</a>
                        <a class="nav-link {{ Request::url() == route('admin/patients') ? 'active' : '' }}" href="/admin/patients"><i
                                class="fa-solid fa-user me-2"></i>Пациенты</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xxl-9 col-md-8">
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
