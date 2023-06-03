@extends('auth.auth')

@section('auth')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h5>
                                На вашу почу отправленно письмо с ссылкой для подтверждения почтового адреса! <br>
                                Для того, чтобы получить доступ к личному кабинету, необходимо перейти по ссылке в письме. <br>
                                Перейдите по ссылке и войдите и личный кабинет
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
