@extends('page.main')

@section('page')
    <div class="container text-center">
        <form method="POST">
            @foreach($mobility as $mob)
                <label> {{$mob->descr}} </label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="{{$mob->code}}"
                           value="1">
                    <label class="form-check-label"> да </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="{{$mob->code}}"
                           value="0">
                    <label class="form-check-label">нет </label>
                </div>
                <hr>
            @endforeach
        </form>
    </div>
@endsection
