@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid">
        <div class="mb-4">
            <h4>{{$user->getFullName()}}, {{$user->getAge()}} <?= $user->gender == 'М' ? "<b style='color:blue'>М</b>" : "<b style='color:pink'>Ж</b>" ?> </h4>
            <hr>
        </div>
        <div class="col-lg-12">
            <form method="POST" action="{{route('my.post')}}">
                @csrf
                <div class="m-auto">
                    <div class="row mb-3">
                        <label for="lastname" class="col-sm-2 col-xxl-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}"
                                   id="lastname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-xxl-2 col-form-label">Имя</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="midname" class="col-sm-2 col-xxl-2 col-form-label">Отчество</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" name="midname" class="form-control" value="{{$user->midname}}"
                                   id="midname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-2 col-xxl-2 col-form-label">Пол</label>
                        <div class="col-sm-10 col-xxl-6 mt-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{$user->gender == "Ж" ? 'checked' : ''}} value="Ж"
                                       type="radio" name="gender"
                                       id="woman">
                                <label class="form-check-label">
                                    Женский
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{$user->gender == "М" ? 'checked' : ''}} value="М"
                                       type="radio" name="gender"
                                       id="man">
                                <label class="form-check-label">
                                    Мужской
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bdate" class="col-sm-3 col-xxl-3 col-form-label">Дата рождения</label>
                        <div class="col-sm-4 col-xxl-4">
                            <input type="date" name="bdate" class="form-control" value="{{$user->bdate}}"
                                   id="bdate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="number_phone" class="col-sm-3 col-xxl-3 col-form-label">Номер телефона</label>
                        <div class="col-sm-4 col-xxl-4">
                            <input id="number_phone" type="tel"
                                   class="form-control @error('number_phone') is-invalid @enderror" name="number_phone"
                                   value="{{$user->number_phone}}"
                                   required><small>Формат: +79ХХХХХХХХХ</small>

                            @error('number_phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-xxl-2 col-form-label">E-mail</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" name="email" class="form-control" value="{{$user->email}}" id="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-xxl-2 col-form-label">Пароль</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="password" name="password" autocomplete="off" placeholder="если пароль менять не надо - оставьте поле пустым" class="form-control" id="password">
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
    </div>
@endsection
