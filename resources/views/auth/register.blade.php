@extends('auth.auth')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Регистрация</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('register.post')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="lastname" type="text" placeholder="Фамилия"
                                           class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                           value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="name" placeholder="Имя" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="midname" type="text" placeholder="Отчество"
                                           class="form-control @error('midname') is-invalid @enderror"
                                           name="midname"
                                           value="{{ old('midname') }}" required autocomplete="midname" autofocus>

                                    @error('midname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="ms-3 mb-3 gender">
                                <label> Пол </label>
                                <div class="form-check">
                                    <input class="form-check-input" value="Ж" type="radio" name="gender"
                                           id="woman">
                                    <label class="form-check-label">
                                        Женский
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="М" type="radio" name="gender"
                                           id="man" checked>
                                    <label class="form-check-label">
                                        Мужской
                                    </label>
                                </div>
                            </div>
{{--                            <div class="ms-3 mb-3 disease">--}}
{{--                                <label> Диагноз </label>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" value="0" type="radio" name="disease"--}}
{{--                                           id="insult">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        Инсульт--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" checked value="1" type="radio" name="disease"--}}
{{--                                           id="other">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        Другое--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-none ms-3 mb-3 brain-side">--}}
{{--                                <label> Полушарие </label>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" value="0" type="radio" name="brain_side"--}}
{{--                                           id="left">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        Левое--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" checked value="1" type="radio" name="brain_side"--}}
{{--                                           id="right">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        Правое--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="number_phone" placeholder="Телефон" type="tel"
                                           class="form-control @error('number_phone') is-invalid @enderror" name="number_phone"
                                           required>

                                    @error('number_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="bdate" placeholder="Дата рождения" type="date"
                                           class="form-control @error('bdate') is-invalid @enderror" name="bdate"
                                           value="{{ old('bdate') }}" required autocomplete="bdate">

                                    @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                {{--                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>--}}
                                <div class="col-md-12">
                                    <input id="email" placeholder="E-mail" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{--                                <label for="password"--}}
                                {{--                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password"
                                           placeholder="Пароль">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-6 d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("input[name='disease']").on("change", function () {
                if ($("#insult").is(":checked")) {
                    $(".brain-side").removeClass('d-none');
                } else {
                    $(".brain-side").addClass('d-none');
                }
            });
        });
    </script>
@endsection
