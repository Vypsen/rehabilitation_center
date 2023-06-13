@extends('app.header')

@section('app')
    <div class="container">
        <div class="card" style="background-color: #ffffff">
            <div class="card-body">
                <div class="h4">Пациенты</div>
                <div class="row">
                    <form method="GET" action="{{ route('logout') }}">
                        <input type="text" class="form-control" placeholder="Пациент по фамилии и лечащему врачу">
                    </form>
                </div>
                <div class="mt-3">
                    @foreach($patients as $patient)
                        <div class="card mb-2"
                             style="border: 1px solid #e5e5e5; box-shadow: 0 0 10px 1px rgba(24, 32, 45, .13);">
                            <div class="row card-body">
                                <div class="">
                                    <a href="" class="link-secondary text-decoration-none"
                                       style="border-bottom: 1px dashed gray;">{{ $patient->getFullName() }}</a>
                                    <div class="">Диагноз: {{ $patient->generalInfo->disease }}</div>
                                    <div class="">Возраст: {{ $patient->getAge() }}</div>
                                    <div class="">Лечащий врач: {{ $patient->doctor->getFullName() }} </div>
                                </div>
                                <div class="">

                                </div>
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