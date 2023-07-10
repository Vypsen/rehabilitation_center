@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('tracked-patient-data.post') }}">
            @csrf
            <div class="me-auto">

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
