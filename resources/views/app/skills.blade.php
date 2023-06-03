@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid">
        <h4><b>Навыки пациента</b></h4>
        <div class="col-lg-12 text-center mt-2">
            <form method="POST" action="{{ route('skills.post') }}">
                @csrf
                @foreach($skills as $skill)
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <label> {{$skill->descr}} </label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$skill->code}}"
                                       value="1" {{$usersSkills[$skill->code] ? 'checked' : ''}}>
                                <label class="form-check-label"> да </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$skill->code}}"
                                       value="0" {{!$usersSkills[$skill->code] ? 'checked' : ''}}>
                                <label class="form-check-label">нет </label>
                            </div>
                            <hr>
                        </div>
                    </div>
                @endforeach
                <div class="container-fluid mt-2">
                    <div class="col-4 d-grid mx-auto">
                        <button type="submit" class="btn btn-success">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
