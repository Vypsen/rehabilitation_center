@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('patient.post') }}">
            @csrf
            <div class="container me-auto">
                <div class="row">
                    <div class="col-xxl-3 col-md-4">
                        <label for="visit_date"> Дата осмотра </label>
                        <input id="visit_date" type="date"
                               class="form-control" name="visit_date"
                               value="{{date('Y-m-d', strtotime($patient->visit_date))}}"
                        >
                    </div>
                    <div class="col-xxl-3 col-md-4">
                        <label for="disease_date"> Дата заболевания </label>
                        <input id="disease_date" type="date"
                               class="form-control" name="disease_date"
                               value="{{date('Y-m-d', strtotime($patient->disease_date))}}"
                        >
                    </div>
                    <div class="col">
                        <label for="address"> Адрес </label>
                        <input id="address" type="text"
                               class="form-control" name="address"
                               value="{{$patient->address}}"
                        >
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-xxl-12">
                        <label for="address"> ФИО и телефоны родственников: </label>
                        <textarea id="relatives_info" type="text" class="form-control"
                                  name="relatives_info">{{$patient->relatives_info}}</textarea>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-xxl-2 col-md-3">
                        <label for="height"> Рост </label>
                        <input id="height" type="text"
                               class="form-control" placeholder="см" name="height"
                               value="{{$patient->height}}"
                        >
                    </div>
                    <div class="col-xxl-2 col-md-3">
                        <label for="weight"> Вес </label>
                        <input id="weight" type="text"
                               class="form-control" placeholder="кг" name="weight"
                               value="{{$patient->weight}}"
                        >
                    </div>
                    <div class="col-xxl col-md-5">
                        <label for="type_body"> Тип конструкции </label>
                        <input id="type_body" type="text"
                               class="form-control" name="type_body"
                               value="{{$patient->type_body}}"
                        >
                    </div>
                </div>
                <div class="row my-3">
                    <label for="disease" class="col-xxl-2 col-form-label">Диагноз</label>
                    <div class="col-sm-10">
                        <input type="text" name="disease" class="form-control" value="{{$patient->disease}}"
                               id="disease">
                    </div>
                </div>
                <div class="row my-3">
                    <label for="extra_disease" class="col-form-label">Сопутствующие
                        заболевания</label>
                    <div class="col-md-12 col-xxl-12">
                        <textarea id="extra_disease" type="text" class="form-control"
                                  name="extra_disease">{{$patient->extra_disease}}</textarea>
                    </div>
                </div>
                <div class="row my-3">
                    <label for="allergy" class="col-form-label">Аллергии</label>
                    <div class="col-sm-12 col-xxl-12">
                        <textarea type="text" name="allergy" class="form-control"
                                  id="allergy">{{$patient->allergy}}</textarea>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="row col-xxl-3 col-md-4">
                        <label for="extra_disease" class="col-form-label">Глюкоза</label>
                        <div class="">
                            <input id="extra_disease" type="text"
                                   class="col-12 form-control"
                                   name="glucose"
                                   value="{{$patient->glucose}}"
                            >
                        </div>
                    </div>
                    <div class="row col-xxl-3 col-md-3">
                        <label for="extra_disease" class="col-form-label">АД</label>
                        <div class="">
                            <input id="blood_pressure" type="text"
                                   class="form-control"
                                   name="blood_pressure"
                                   value="{{$patient->blood_pressure}}">
                        </div>
                    </div>
                    <div class="row col-xxl-3 col-md-3">
                        <label for="extra_disease" class="col-form-label">Ps</label>
                        <div class="">
                            <input id="Ps" type="text"
                                   class="form-control"
                                   name="Ps"
                                   value="{{$patient->Ps}}">
                        </div>
                    </div>
                    <div class="row col-xxl-3 col-md-3">
                        <label for="extra_disease" class="col-form-label">SpO</label>
                        <div class="">
                            <input id="extra_disease" type="text"
                                   class="form-control"
                                   name="SpO"
                                   value="{{$patient->SpO}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-md-3">
                        <label for="extra_disease" class="col-form-label">Сахарный диабет</label>
                        <div class="">
                            <select name="diabetes" class="form-select">
                                <option {{$patient->diabetes == 'Отсутствует' ? 'selected' : ''}}>Отсутствует</option>
                                <option {{$patient->diabetes == 'Первичный' ? 'selected' : ''}}>Первичный</option>
                                <option {{$patient->diabetes == 'Вторичный' ? 'selected' : ''}}>Вторичный</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="dysphasia" class="col-form-label">Дисфазия</label>
                        <div class="">
                            <select name="dysphasia" class="form-select">
                                <option {{$patient->dysphasia == 'Отсутствует' ? 'selected' : ''}}>Отсутствует</option>
                                <option {{$patient->dysphasia == 'Сенсорная' ? 'selected' : ''}} >Сенсорная</option>
                                <option {{$patient->dysphasia == 'Моторная' ? 'selected' : ''}}>Моторная</option>
                                <option {{$patient->dysphasia == 'Дизартрия' ? 'selected' : ''}}>Дизартрия</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-xxl-5 col-md-6">
                        <label for="visual_or_sensory_extinction" class="col-form-label">Зрительное/Сенсорное
                            угасание</label>
                        <select name="visual_or_sensory_extinction" class="form-select">
                            <option {{$patient->visual_or_sensory_extinction == 'Отсутствует' ? 'selected' : ''}}>
                                Отсутствует
                            </option>
                            <option {{$patient->visual_or_sensory_extinction == 'Зрительное' ? 'selected' : ''}}>
                                Зрительное
                            </option>
                            <option {{$patient->visual_or_sensory_extinction == 'Сенсорное' ? 'selected' : ''}}>
                                Сенсорное
                            </option>
                            <option {{$patient->visual_or_sensory_extinction == 'Присутствуют оба' ? 'selected' : ''}}>
                                Присутствуют оба
                            </option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="swallowing" class="col-form-label">Глотание</label>
                        <select name="swallowing" class="form-select">
                            <option {{$patient->swallowing == 'Способен' ? 'selected' : ''}}>Способен</option>
                            <option {{$patient->swallowing == 'Не способен' ? 'selected' : ''}}>Не способен</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="talk" class="col-form-label">Речь</label>
                        <select name="talk" class="form-select">
                            <option {{$patient->talk == 'Есть' ? 'selected' : ''}}>Есть</option>
                            <option {{$patient->talk == 'Нет' ? 'selected' : ''}}>Нет</option>
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-xxl-4 col-md-5">
                        <label for="anxiety" class="col-form-label">Состояние тревожности</label>
                        <select name="anxiety" class="form-select">
                            <option {{$patient->anxiety == 'Есть' ? 'selected' : ''}}>Есть</option>
                            <option {{$patient->anxiety == 'Нет' ? 'selected' : ''}}>Нет</option>
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-xxl-3 col-md-3">
                        <label for="cardio_system" class="col-form-label">ССС</label>
                        <select name="cardio_system" class="form-select">
                            <option {{$patient->cardio_system == 'Без патологи' ? 'selected' : ''}}>Без патологий
                            </option>
                            <option {{$patient->cardio_system == 'АГ' ? 'selected' : ''}}>АГ</option>
                            <option {{$patient->cardio_system == 'ИБС' ? 'selected' : ''}}>ИБС</option>
                            <option {{$patient->cardio_system == 'Фибрилляция предсердий' ? 'selected' : ''}}>
                                Фибрилляция предсердий
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="col-form-label">Наличие</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="stents" value="1"
                                   id="flexCheckDefault" {{$patient->stents ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Стентов
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cardiostimulator" value="1"
                                   id="flexCheckChecked" {{$patient->cardiostimulator ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckChecked">
                                Кардиостимуляторов
                            </label>
                        </div>
                    </div>
                </div>
                {{--                    <div class="row my-3">--}}
                {{--                        <label for="edema" class="col-sm-4 col-xxl-3 col-form-label">Отеки</label>--}}
                {{--                        <div class="col-sm-10 col-xxl-10">--}}
                {{--                            <input id="edema" type="text"--}}
                {{--                                   class="form-control"--}}
                {{--                                   name="edema"--}}
                {{--                            >--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <div class="my-3 row">
                    <label for="pain" class="col-form-label"><b>Боль</b></label>
                    <div class="col-sm-10 col-xxl-6">
                        <label for="pain" class="col-form-label">Локализация</label>
                        <input id="pain" type="text"
                               class="form-control"
                               name="pain_place"
                               value="{{$patient->pain_place}}">
                    </div>
                    <div class="col-sm-10 col-xxl-6">
                        <label for="pain" class="col-form-label">Частота</label>
                        <input id="pain" type="text"
                               class="form-control"
                               name="pain_periodicity" value="{{$patient->pain_periodicity}}">
                    </div>
                </div>
                <div class="my-3 row">
                    <label for="pain" class="col-form-label"><b>Кожа</b></label>
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="skin_damage" value="1"
                               id="flexCheckDefault" {{$patient->skin_damage ? 'checked' : ''}}>
                        <label class="form-check-label" for="flexCheckDefault">
                            Повреждения кожи
                        </label>
                    </div>
                    <div class="">
                        <label for="pain" class="col-form-label">Локализация</label>
                        <input id="pain" type="text"
                               class="form-control"
                               name="skin_damage_place" value="{{$patient->skin_damage_place}}">
                    </div>
                </div>
                {{--                    <div class="my-3 row">--}}
                {{--                        <label for="" class="col-form-label">Наличие</label>--}}
                {{--                        <div class="col-md-4">--}}
                {{--                            <div class="form-check">--}}
                {{--                                <input class="form-check-input" name="dyspnoea" type="checkbox" id="inlineCheckbox1"--}}
                {{--                                       value="1">--}}
                {{--                                <label class="form-check-label" for="inlineCheckbox1">Отдышка</label>--}}
                {{--                            </div>--}}
                {{--                            <div class="form-check">--}}
                {{--                                <input class="form-check-input" name="cough" type="checkbox" id="inlineCheckbox2"--}}
                {{--                                       value="1">--}}
                {{--                                <label class="form-check-label" for="inlineCheckbox2">Кашель</label>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-md-7">--}}
                {{--                            <div class="form-check">--}}
                {{--                                <input class="form-check-input" name="asthma" type="checkbox" id="inlineCheckbox3"--}}
                {{--                                       value="1">--}}
                {{--                                <label class="form-check-label" for="inlineCheckbox3">Бронхиальная астма</label>--}}
                {{--                            </div>--}}
                {{--                            <div class="form-check">--}}
                {{--                                <input class="form-check-input" name="smoking" type="checkbox" id="inlineCheckbox4"--}}
                {{--                                       value="1">--}}
                {{--                                <label class="form-check-label" for="inlineCheckbox4">Курение</label>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <div class="row my-3">
                    <label for="" class="col-form-label"><b>Выделения</b></label>
                    <div class="col-lg-6">
                        <div class="">
                            <label for="" class="col-form-label"><b>Моча</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="urine_incontinence" value="1"
                                       id="flexCheckDefault" {{$patient->urine_incontinence ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Недержание
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="frequent_urination" value="1"
                                       id="flexCheckChecked" {{$patient->frequent_urination ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Частое мочеиспусчкание
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Никтуория (если есть)
                                </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" name="nikturia_count"
                                           placeholder="раз за ночь"
                                           id="flexCheckChecked" value="{{$patient->nikturia_count}}">
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="urinary_catheter" value="1"
                                       id="flexCheckChecked" {{$patient->urinary_catheter ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Мочевой катетер
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rep_urinary_infection"
                                       value="1"
                                       id="flexCheckChecked" {{$patient->rep_urinary_infection ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Повторная мочевая инфекция
                                </label>
                            </div>
                            <div class="">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Другие особенности:
                                </label>
                                <textarea class="form-control" type="text" name="urine_features"
                                          id="flexCheckChecked">{{$patient->urine_features}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="">
                            <label for="" class="col-form-label"><b>Кал</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="excrement_incontinence"
                                       value="1"
                                       id="flexCheckDefault" {{$patient->excrement_incontinence ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Недержание
                                </label>
                            </div>
                            <div class="form-check ">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Акты дефекации
                                </label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" value="{{$patient->defecation_count}}"
                                           name="defecation_count"
                                           placeholder="раз в день"
                                           id="flexCheckChecked">
                                </div>
                            </div>
                            <label for="" class="col-form-label"><b>Слабительное</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="laxative"
                                       value="1"
                                       id="flexCheckChecked" {{$patient->laxative ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Приём
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Частота
                                </label>
                                <input class="form-control w-50" type="text" placeholder="раз в день"
                                       name="laxative_count"
                                       id="flexCheckChecked" value="{{$patient->laxative_count}}">
                            </div>
                            <div class="">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Название
                                </label>
                                <input class="form-control" type="text" name="laxative_name"
                                       placeholder=""
                                       id="flexCheckChecked" value="{{$patient->laxative_name}}">
                            </div>
                        </div>
                    </div>
                </div>
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

<style>


</style>

<script>
    $(document).ready(function () {
        $('.patient').addClass('disabled').css('color', '#199c68').css('background-color', 'white');
    })
</script>
