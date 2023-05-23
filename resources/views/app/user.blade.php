@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid">
        <form method="POST" action="{{route('my.post')}}">
            @csrf
            <div class="m-auto">
                <div class="row mb-3">
                    <label for="lastname" class="col-sm-2 col-xxl-3 col-form-label">Фамилия</label>
                    <div class="col-sm-10 col-xxl-6">
                        <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}"
                               id="lastname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-xxl-3 col-form-label">Имя</label>
                    <div class="col-sm-10 col-xxl-6">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="midname" class="col-sm-2 col-xxl-3 col-form-label">Отчество</label>
                    <div class="col-sm-10 col-xxl-6">
                        <input type="text" name="midname" class="form-control" value="{{$user->midname}}" id="midname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bdate" class="col-sm-2 col-xxl-3 col-form-label">Дата рождения</label>
                    <div class="col-sm-10 col-xxl-4">
                        <input type="date" name="bdate" class="form-control" value="{{date('Y-m-d', $user->bdate)}}"
                               id="bdate">
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-4 d-grid mx-auto">
                    <button type="submit" class="btn btn-success">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
    <style>

    </style>
    <script>
        $(document).ready(function () {
            $('.user').addClass('disabled').css('color', '#199c68').css('background-color', 'white');
        })
    </script>
@endsection
