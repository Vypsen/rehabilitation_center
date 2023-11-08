@extends('app.header')

@section('app')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="card col-lg-11" style="-webkit-box-shadow: 0px 0px 8px 4px rgba(34, 60, 80, 0.2);
-moz-box-shadow: 0px 0px 8px 4px rgba(34, 60, 80, 0.2);
box-shadow: 0px 0px 8px 4px rgba(34, 60, 80, 0.2);">
                <div class="card-body">
                    <div class="h4">Упражнения для самореабилитации</div>
                    <div class="">
                        <div class="row mt-3">
                            <div class="col-lg-8">
                                <div class="h5 w-auto d-table" style="border-bottom: 1px dashed gray">
                                    {{key($exercises)}}
                                </div>
                                @foreach($exercises[key($exercises)] as $exercise)
                                    <div class="row my-2">
                                        <div class=" col-lg-1">
                                            <input style="float: right" class="form-check-input" type="checkbox"
                                                   id="check1" name="option1"
                                                   value="something">
                                        </div>
                                        <div class="col-lg-11">
                                            {{$exercise}}
                                        </div>
                                    </div>
                                    <hr class="d-xxl-none">
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <div class="h4 pb-2 ps-3">Рекомендации докторов</div>
                                @foreach($doctors as $doctor)
                                    <div class="container mb-3" style="">
                                        <div class="card" style="-webkit-box-shadow: 0 0 8px 0 rgba(34, 60, 80, 0.2);
                                            -moz-box-shadow: 0 0 8px 0 rgba(34, 60, 80, 0.2);
                                            box-shadow: 0 0 8px 0 rgba(34, 60, 80, 0.2);">
                                            <div class="card-body">
                                                <div class="">
                                                    {{$doctor->getFullName()}}
                                                </div>
                                                <small>
                                                    <p class="text-muted">
                                                        {{$doctor->post}}
                                                    </p>
                                                </small>
                                                <small>
                                                    <p class="text-muted">
                                                        {{$doctor->pivot->created_at}}
                                                    </p>
                                                </small>
                                                <hr>
                                                <div>
                                                    <p class="lead">
                                                        {{$doctor->pivot->comment}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-check-input:checked {
            background-color: #199c68;
            border-color: #199c68;
        }
    </style>
@endsection
