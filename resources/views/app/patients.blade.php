@extends('app.header')

@section('app')
    <div class="container">
        <div class="card" style="background-color: #ffffff">
            <div class="card-body">
                <div class="row mb-3">
                    <h3 class="ms-2">Пациенты</h3>
                </div>
                <div class="row">
                    <form method="GET" action="{{ route('search-patients') }}">
                        <div class="row">
                            <div class="col-xxl-4">
                                <input type="text" name="patient" class="form-control" value="{{ request('patient') }}"
                                       placeholder="Фамилия пациента">
                                @auth('doctor')
                                    <div class="form-check mt-2 ms-2">
                                        <input class="form-check-input" name="my_patients"
                                               {{request('my_patients') ? 'checked' : ''}} type="checkbox"
                                               id="inlineFormCheck">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            Мои пациенты
                                        </label>
                                    </div>
                                @endauth
                            </div>
                            <div class="col-xxl-4">
                                <input type="text" name="doctor_lastname" class="form-control"
                                       value="{{ request('doctor_lastname') }}" placeholder="Фамилия доктора">
                            </div>
                            <div class="col-xxl-2">
                                <button class="btn btn-success">Найти</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-3">
                    @foreach($patients as $patient)
                        <div class="card mb-2"
                             style="border: 1px solid #e5e5e5; box-shadow: 0 0 10px 1px rgba(24, 32, 45, .13);">
                            <div class="row card-body">
                                <div class="col-4">
                                    <div class="">
                                        <a href="" class="link-secondary text-decoration-none"
                                           style="border-bottom: 1px dashed grey;">{{ $patient->getFullName() }}</a>
                                    </div>
                                    <div class="">Диагноз: {{ $patient->generalInfo->disease }}</div>
                                    <div class="">Возраст: {{ $patient->getAge() }}</div>
                                </div>
                                @auth('doctor')
                                    <div class="col-1 offset-7 my-auto">
                                        <div class="fs-3">
                                            @if (!Auth::user()->patients()->find($patient->id))
                                                <a class="link-success add-pat disabled" id="{{$patient->id}}" title="Добавить к себе">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                                <a  class="link-danger del-pat disabled d-none" id="{{$patient->id}}" title="Убрать из моих пациентов">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            @else
                                                <a class="link-success add-pat disabled d-none" id="{{$patient->id}}" title="Добавить к себе">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                                <a  class="link-danger del-pat disabled" id="{{$patient->id}}" title="Убрать из моих пациентов">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                            <div class="spinner-border text-success load d-none" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="">
                    <div class="d-flex">
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.add-pat').click(function () {
                var link = $(this);
                link.addClass('d-none');
                link.nextAll('.load').removeClass('d-none');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'doctor/add-my-patient',
                    method: "POST",
                    data: {'id': $(this).attr('id')},
                    success: function (response){
                        link.nextAll('.load').addClass('d-none');
                        link.next().removeClass('d-none');
                    }
                })
            })

            $('.del-pat').click(function () {
                var link = $(this);

                link.addClass('d-none');
                link.nextAll('.load').removeClass('d-none');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'doctor/del-my-patient',
                    method: "POST",
                    data: {'id': $(this).attr('id')},
                    success: function (response){
                        link.nextAll('.load').addClass('d-none');
                        link.prev().removeClass('d-none');
                    }
                })
            })
        })
    </script>

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
            color: white;
        }
    </style>
@endsection
