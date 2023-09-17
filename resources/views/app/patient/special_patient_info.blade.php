@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('tracked-patient-data.post') }}">
            @csrf
            <div class="me-auto">
                @include('app.patterns.patient_spec_info', ['role' => 'patient', "patient" => $patient, 'srm' => DB::table('SRM_descr')->get()->all()])
            </div>
            <div class="container mt-2">
                <div class="col-4 d-grid mx-auto">
                    <button type="submit" class="btn btn-success">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
