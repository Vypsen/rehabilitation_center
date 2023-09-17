@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid skills">
        <h4><b>Навыки пациента</b></h4>
        <div class="col-lg-12 text-center mt-2">
            <form method="POST" action="{{ route('skills.post') }}">
                @csrf
                @include('app.patterns.skills_info', ['role' => 'patient', 'skills' => DB::table('skills_name')->get(), 'usersSkills' => $usersSkills])
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
                    $(this).closest('.skill').nextAll().find('input[value="0"]').prop('checked', true);
                }
            })
        })
    </script>
@endsection
