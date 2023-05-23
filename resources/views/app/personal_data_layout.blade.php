@extends('app.header')

@section('app')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 card p-2">
            <div class="d-flex justify-content-center menu mb-4">
                <a class="d-inline-block px-5 m-2 btn btn user " href="/my">Пользователь</a>
                <a class="d-inline-block px-5 m-2 btn btn" href="/">Общие мед. данные</a>
                <a class="d-inline-block px-5 m-2 btn btn" href="">Спец мед. данные</a>
                <a class="d-inline-block px-5 m-2 btn btn" href="">Навыки пациента</a>
            </div>
            <div class="col-lg-7 m-auto">
                @yield('info')
            </div>
        </div>
    </div>
    <style>
        .menu a {
            background-color: #F5F8F5;
        }

        .card {
            border: 0;
            -webkit-box-shadow: 0px 0px 32px 5px rgba(34, 60, 80, 0.2);
            -moz-box-shadow: 0px 0px 32px 5px rgba(34, 60, 80, 0.2);
            box-shadow: 0px 0px 32px 5px rgba(34, 60, 80, 0.2);
        }

        .d-inline-block {
            border: 2px solid rgba(0, 0, 0, 0.225);
        }

        .d-inline-block:hover {
            color: #199c68;
            -webkit-box-shadow: 0px 0px 7px 3px rgba(34, 60, 80, 0.2);
            -moz-box-shadow: 0px 0px 7px 3px rgba(34, 60, 80, 0.2);
            box-shadow: 0px 0px 7px 3px rgba(34, 60, 80, 0.2);
        }

    </style>
    <script>
    </script>
@endsection
