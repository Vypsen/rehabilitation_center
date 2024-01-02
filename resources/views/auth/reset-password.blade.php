@extends('auth.auth')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Восстановление пароля</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12 ">
                                    <input id="email" type="email"
                                           class="d-none form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email" autofocus
                                           placeholder="E-mail" value="<?= $_GET['email'] ?>">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="password" type="password"
                                           class="form-control" name="password"
                                           required autocomplete="password" autofocus
                                           placeholder="Новый пароль">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input id="password_confirmation" type="password"
                                           class="form-control" name="password_confirmation"
                                           required autocomplete="password_confirmation" autofocus
                                           placeholder="Подтвердите пароль">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-md-12 d-none">
                                    <input id="token" type="password"
                                           class="form-control" name="token"
                                           required autocomplete="token" autofocus
                                           placeholder="token"
                                    value="{{ $token }}">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 d-grid mx-auto">
                                    <button type="submit" class="btn btn-success">
                                        Восстановить пароль
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
