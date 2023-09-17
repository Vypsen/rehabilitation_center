@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid">
        <div class="mb-4">
            <h4>Создание нового администратора</h4>
            <hr>
        </div>
        <div class="col-lg-12">
            <form method="POST" action="{{route('create-doctor.post')}}">
                @csrf
                <div class="m-auto">
                    <div class="row mb-3">
                        <label for="lastname"  class="col-sm-2 col-xxl-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" required name="lastname" class="form-control"
                                   id="lastname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-xxl-2 col-form-label">Имя</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" required name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="midname" class="col-sm-2 col-xxl-2 col-form-label">Отчество</label>
                        <div class="col-sm-10 col-xxl-6">
                            <input type="text" name="midname" class="form-control" id="midname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-2 col-xxl-2 col-form-label">Пол</label>
                        <div class="col-sm-10 col-xxl-6 mt-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" value="Ж"
                                       type="radio" name="gender"
                                       id="woman">
                                <label class="form-check-label">
                                    Женский
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" value="М"
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
                            <input type="date" required name="bdate" class="form-control" id="bdate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="number_phone" class="col-sm-3 col-xxl-3 col-form-label">Номер телефона</label>
                        <div class="col-sm-4 col-xxl-4">
                            <input id="number_phone" type="tel"
                                   class="form-control @error('number_phone') is-invalid @enderror" name="number_phone"
                                   required ><small>Формат: +79ХХХХХХХХХ</small>

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
                            <input type="text" required name="email" class="form-control" id="email">
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
