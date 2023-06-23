@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid skills">
        <h4><b>Навыки пациента</b></h4>
        <div class="col-lg-12 text-center mt-2">
            <form method="POST" action="{{ route('skills.post') }}">
                @csrf
                @foreach($skills as $skill)
                    <div class="row skill">
                        <div class="col-lg-10 mx-auto ">
                            <label> {{$skill->descr}} </label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled type="radio" name="{{$skill->code}}"
                                       value="1" {{$usersSkills[$skill->code] ? 'checked' : ''}}>
                                <label class="form-check-label"> да </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled type="radio" name="{{$skill->code}}"
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

    <script>
        $(document).ready(function () {
            $('.skill').find('input[value="1"]:checked').closest('.skill').next().find('input').prop('disabled', false);

            $('.skill:first input').prop('disabled', false);
            $('.skill input').change(function () {
                if($(this).val() == 1) {
                    $(this).closest('.skill').next().find('input').prop('disabled', false);
                }
                else {
                    $(this).closest('.skill').nextAll().find('input').prop('disabled', true);
                    // $(this).closest('.skill').nextAll().find('input[value="0"]').prop('checked', true);
                }
            })
        })
    </script>
@endsection
