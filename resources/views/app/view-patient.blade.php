@extends('app.header')

@section('app')

    <div class="container-fluid ">
        <div class="card" style="min-height: 1200px;">
            <div class="card-body">
                <div class="">
                    <div class="h4">{{$patient->getFullName()}}, {{ date('d.m.Y', strtotime($patient->bdate)) }}</div>
                    <div class="h5">{{$patient->email}}, {{ $patient->number_phone }}</div>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-xxl-7 col-md-12">
                        <div class="mb-5">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#generalInfo" aria-expanded="false"
                                                aria-controls="generalInfo">
                                            Общие мед. данные
                                        </button>
                                    </h2>
                                    <div id="generalInfo" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            @include('app.patterns.patient_general_info', ['role' => 'doctor', "patient" => $patient->generalInfo])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#specInfo" aria-expanded="false"
                                                aria-controls="specInfo">
                                            Специальные мед. данные
                                        </button>
                                    </h2>
                                    <div id="specInfo" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            @foreach($patient->trackedInfo as $tInfo)
                                                <div class="accordion mb-3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#{{'tInfo'.strval($tInfo->id)}}"
                                                                    aria-expanded="false"
                                                                    aria-controls="{{'tInfo'.strval($tInfo->id)}}">
                                                                {{$tInfo->created_at}}
                                                            </button>
                                                        </h2>
                                                        <div id="{{'tInfo'.strval($tInfo->id)}}"
                                                             class="accordion-collapse collapse">
                                                            <div class="accordion-body">
                                                                @include('app.patterns.patient_spec_info', ['role' => 'doctor', "patient" => $tInfo, 'srm' => DB::table('SRM_descr')->get()->all()])
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
                        <div class="mb-5">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#skills" aria-expanded="false"
                                                aria-controls="skills">
                                            Навыки пациента
                                        </button>
                                    </h2>
                                    <div id="skills" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            @foreach($patient->skills as $pSkill)
                                                <div class="accordion mb-3">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#{{'skill'.strval($pSkill->id)}}"
                                                                    aria-expanded="false"
                                                                    aria-controls="{{'skill'.strval($pSkill->id)}}">
                                                                {{$tInfo->created_at}}
                                                            </button>
                                                        </h2>
                                                        <div id="{{'skill'.strval($pSkill->id)}}"
                                                             class="accordion-collapse collapse">
                                                            <div class="accordion-body">
                                                                @include('app.patterns.skills_info', ['role' => 'doctor', 'skills' => DB::table('skills_name')->get(), 'usersSkills' => $pSkill])
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
                        <div class="mb-5" >
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#recovery" aria-expanded="false"
                                                aria-controls="recovery">
                                            Получаемое лечение
                                        </button>
                                    </h2>
                                    <div id="recovery" class="accordion-collapse collapse">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-md-12 position-relative">
                        <div class="position-fixed w-25">
                            <form method="POST" id="set-comment" action="{{ route('set-comment.post') }}">
                                @csrf
                                <div class="mb-2">
                                    <textarea required class="form-control" name="comment" placeholder="Рекомендация по лечению"
                                              rows="10"></textarea>
                                </div>
                                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                <div class="row float-end">
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-success">
                                            Сохранить
                                        </button>
                                    </div>
                                    <div class="col-3 d-none load">
                                        <div class="spinner-border text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .accordion-button:not(.collapsed) {
            background-color: #e5ffe5;
            color: #199c68;
        }

        .accordion-button {
            background-color: #e5ffe5;
            color: #199c68;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('#set-comment button').click(function (ev) {

                ev.preventDefault();
                var patientId = $('#set-comment [name="patient_id"]').val();
                var comment = $('#set-comment [name="comment"]').val();

                var formData = {
                    patient_id: patientId,
                    comment: comment,
                };

                $('.load').removeClass('d-none');
                $('#set-comment button').addClass('d-none');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/doctor/comment',
                    method: "POST",
                    data: formData,
                    success: function (response) {
                        $('.load').addClass('d-none');
                        $('#set-comment button').removeClass('d-none');
                    }
                })

            })
        })
    </script>

@endsection
