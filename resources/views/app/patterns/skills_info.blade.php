<div class="container-fluid skills {{$role}}">
{{--    <h4><b>Навыки пациента</b></h4>--}}
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
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        if ($('.skills').hasClass('doctor')) {
            $(this).find('input, textarea, select').attr('disabled', true);
        }
    });
</script>
