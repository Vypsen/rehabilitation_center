@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('tracked-patient-data.post') }}">
            @csrf
            <div class="container me-auto">
                <div class="row">
                    <h5><b>Чувствительность</b></h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тактильная</th>
                                <th scope="col">Температурная</th>
                                <th scope="col" class="col-md-2">Болевая</th>
                                <th scope="col" class="col-md-8">Мышечно—суставное чувство</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Рука</th>
                                <td><input name="hand_tactility" value="1"
                                           {{$patient->hand_tactility ? 'checked' : ''}} type="checkbox"></td>
                                <td><input name="hand_t" value="1"
                                           {{$patient->hand_t ? 'checked' : ''}} type="checkbox"></td>
                                <td><input name="hand_pain" value="1"
                                           {{$patient->hand_pain ? 'checked' : ''}} type="checkbox"></td>
                                <td><input name="hand_musculoskeletal_feeling" value="1"
                                           {{$patient->hand_musculoskeletal_feeling ? 'checked' : ''}} type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Нога</th>
                                <td><input name="leg_tactility" value="1"
                                           {{$patient->leg_tactility ? 'checked' : ''}} type="checkbox"></td>
                                <td><input name="leg_t" value="1" {{$patient->leg_t ? 'checked' : ''}} type="checkbox">
                                </td>
                                <td><input name="leg_pain" value="1"
                                           {{$patient->leg_pain ? 'checked' : ''}} type="checkbox"></td>
                                <td><input name="leg_musculoskeletal_feeling" value="1"
                                           {{$patient->leg_musculoskeletal_feeling ? 'checked' : ''}} type="checkbox">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-xxl-3 col-md-4">
                        <label for="type_disorder" class="col-form-label">Нарушения</label>
                        <div class="">
                            <select name="type_disorder" class="form-select">
                                <option {{$patient->type_disorder == 'Двигательные' ? 'selected' : ''}}>Двигательные
                                </option>
                                <option {{$patient->type_disorder == 'Чувствительные' ? 'selected' : ''}}>
                                    Чувствительные
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-5">
                        <label for="memory_loss" class="col-form-label">Потеря памяти</label>
                        <div class="">
                            <select name="memory_loss" class="form-select">
                                <option {{$patient->memory_loss == 'Отсутствует' ? 'selected' : ''}}>Отсутствует
                                </option>
                                <option {{$patient->memory_loss == 'Кратковременная' ? 'selected' : ''}}>
                                    Кратковременная
                                </option>
                                <option {{$patient->memory_loss == 'Долговременная' ? 'selected' : ''}}>Долговременная
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-md-6">
                        <label for="orientation" class="col-form-label">Нарушение ориентации</label>
                        <div class="">
                            <select name="orientation" class="form-select">
                                <option {{$patient->orientation == 'В норме' ? 'selected' : ''}}>В норме</option>
                                <option {{$patient->orientation == 'Нарушенна в простанстве' ? 'selected' : ''}}>
                                    Нарушенна в простанстве
                                </option>
                                <option {{$patient->orientation == 'Нарушенна во времени' ? 'selected' : ''}}>Нарушенна
                                    во времени
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="сol-12">
                        <label for="edema" class="col-form-label">Отеки</label>
                        <div class="">
                            <textarea id="edema" class="form-control" name="edema">{{$patient->edema}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="" class="col-form-label"><b>Дыхательная система</b></label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="shortness" value="1"
                                   id="flexCheckDefault" {{$patient->shortness ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Отдышка
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cough" value="1"
                                   id="flexCheckChecked" {{$patient->cough ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckChecked">
                                Кашель
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asthma" value="1"
                                   id="flexCheckDefault" {{$patient->asthma ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Бронхиальная астма
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="smoking" value="1"
                                   id="flexCheckChecked" {{$patient->smoking ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckChecked">
                                Курение
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="" class="col-form-label"><b>Сон</b></label>
                    <div class="col-2">
                        <label class="" for="sleep_count">Кол-во часов сна</label>
                        <select  class="form-select" aria-label="Hour"  id="sleep_count" name="sleep_count">
                            <?php for ($i = 1; $i <= 24; $i++): ?>
                            <option {{$patient->sleep_count == $i ? 'selected' : ''}} value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-7 my-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="insomnia" type="checkbox"
                                   {{$patient->insomnia ? 'checked' : ''}} id="insomnia" value="1">
                            <label class="form-check-label" for="insomnia">Бессоница</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="sedatives"
                                   {{$patient->sedatives ? 'checked' : ''}} type="checkbox" id="sedatives" value="1">
                            <label class="form-check-label" for="sedatives">Прием седативных препаратов</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <h5><b>Шкала реабилитационной маршрутизации (ШРМ)</b></h5>
                    <div class="container">
                        @foreach($srm as $s)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{$patient->SRM == $s->point ? 'checked' : ''}} value="{{$s->point}}" name="SRM">
                            <label class="form-check-label">
                                <b>{{$s->severity}}</b>
                                <br>
                                {{$s->descr}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
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
