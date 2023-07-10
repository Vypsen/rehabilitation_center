@extends('app.header')

@section('app')

    <div class="container-fluid">
        <div class="card" style="min-height: 1000px;">
            <div class="card-body">
                <div class="">
                    <div class="h4">{{$patient->getFullName()}}, {{ date('d.m.Y', strtotime($patient->bdate)) }}</div>
                    <div class="h5">{{$patient->email}}, {{ $patient->number_phone }}</div>
                </div>
                <hr>
                <br>
                <div class="col-lg-7">
                    <div class="mb-5">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#specInfo" aria-expanded="false" aria-controls="specInfo">
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
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

@endsection
