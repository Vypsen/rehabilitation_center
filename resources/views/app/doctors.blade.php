@extends('app.header')

@section('app')
    <div class="container">
        <div class="card" style="background-color: #ffffff">
            <div class="card-body">
                <div class="h4">Доктора</div>
                <div class="row">
                    <form method="GET" action="{{ route('search-doctors') }}">
                        <input type="text" name="doctor" class="form-control" placeholder="Фамилия или должность">
                    </form>
                </div>
                <div class="mt-3">
                    @foreach($doctors as $doctor)
                        <div class="card mb-2"
                             style="border: 1px solid #e5e5e5; box-shadow: 0 0 10px 1px rgba(24, 32, 45, .13);">
                            <div class="row card-body">
                                <div class="">
                                    <div class="">
                                        <a href="" class="link-secondary text-decoration-none"
                                           style="border-bottom: 1px dashed grey;">{{ $doctor->getFullName() }}</a>
                                    </div>
                                    <div class="">Возраст: {{ $doctor->getAge() }}</div>
                                    <div class="">Должность: <b>{{ $doctor->post}}</b></div>
                                </div>
                                <div class="">

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
