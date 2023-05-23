@extends('page.main')

@section('page')
    <div class="col-lg-4 text-center">
        @foreach($mobility as $mob)
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <label> {{$mob->descr}} </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$mob->code}}"
                               value="1" {{isset($userMobility[$mob->code]) ? 'checked' : ''}}>
                        <label class="form-check-label"> да </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{$mob->code}}"
                               value="0" {{!isset($userMobility[$mob->code]) ? 'checked' : ''}}>
                        <label class="form-check-label">нет </label>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
@endsection
