@extends('app.header')

@section('app')
    <div class="container">
        <div class="card" style="background-color: #ffffff">
            <div class="card-body">
                <div class="h4">Доктора</div>
                <div class="row">
                    <form method="GET" action="{{ route('search-doctors') }}">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" value="{{ request('doctor') }}" name="doctor" class="form-control"
                                       placeholder="Фамилия или должность">
                            </div>
                            <div class="col d-flex">
                                <div class="me-4">
                                    <button class="btn btn-success">Найти</button>
                                </div>
                                <div class="">
                                    <a type="button" href="/admin/create/doctor" class="text-white btn btn-info">Создать</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-3">
                    @foreach($doctors as $doctor)
                        <div class="card mb-2"
                             style="border: 1px solid #e5e5e5; box-shadow: 0 0 10px 1px rgba(24, 32, 45, .13);">
                            <div class="row card-body">
                                <div class="">
                                    <div class="">
                                        <a href="{{route('view-doctor', ['id' => $doctor->id])}}" class="link-secondary text-decoration-none"
                                           style="border-bottom: 1px dashed grey;">{{ $doctor->getFullName() }}</a>
                                        <a title="Найти пациетов" class="link-success ms-2"
                                           href="{{ route('search-patients', ['doctor_lastname' => $doctor->lastname]) }}">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </a>
                                    </div>
                                    <div class="">Должность: <b>{{ $doctor->post}}</b></div>
                                    <div class="">e-mail: <b>{{ $doctor->email}}</b></div>
                                    <div class="">Номер телефона: <b>{{ $doctor->number_phone}}</b></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="">
                    <div class="d-flex">
                        {{ $doctors->links() }}
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
