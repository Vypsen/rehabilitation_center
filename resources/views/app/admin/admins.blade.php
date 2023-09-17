@extends('app.header')

@section('app')
    <div class="container">
        <div class="card" style="background-color: #ffffff">
            <div class="card-body">
                <div class="h4">Админы</div>
                <div class="row">
                    <form method="GET" action="{{ route('search-admins') }}">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" value="{{ request('admin') }}" name="admin" class="form-control"
                                       placeholder="Фамилия">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-3">
                    @foreach($admins as $admin)
                        <div class="card mb-2"
                             style="border: 1px solid #e5e5e5; box-shadow: 0 0 10px 1px rgba(24, 32, 45, .13);">
                            <div class="row card-body">
                                <div class="">
                                    <div class="">
                                        <a href="" class="link-secondary text-decoration-none"
                                           style="border-bottom: 1px dashed grey;">{{ $admin->getFullName() }}
                                        </a>
                                    </div>
                                    <div class="">e-mail: <b>{{ $admin->email}}</b></div>
                                    <div class="">Номер телефона: <b>{{ $admin->number_phone}}</b></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="">
                    <div class="d-flex">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .pagination .page-link {
        color: #199c68;
    }

    .pagination > a {
        color: #199c68;
    }

    .pagination > .active > .page-link {
        background-color: #199c68;
        border-color: #199c68;
    }
</style>
