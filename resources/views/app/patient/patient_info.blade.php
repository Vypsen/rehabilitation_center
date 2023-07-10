@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('patient.post') }}">
            @csrf
            <div class="me-auto">
                @include('app.patterns.patient_general_info', ['role' => 'patient', "patient" => $patient])
            </div>

            <div class="row">
                <div class="col-3 d-grid mx-auto">
                    <button type="submit" class="btn btn-success">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
