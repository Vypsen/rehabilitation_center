@extends('app.personal_data_layout')

@section('info')
    <div class="container-fluid ">
        <form method="POST" action="{{ route('patient_info.post') }}">
            @csrf
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="row">
                        <div class="col-xxl-2 col-md-3">
                            <label for="visit_date"> Дата осмотра </label>
                            <input id="visit_date" type="date"
                                   class="form-control" name="visit_date"
                                   required>
                        </div>
                        <div class="col-xxl-2 col-md-3">
                            <label for="disease_date"> Дата заболевания </label>
                            <input id="disease_date" type="date"
                                   class="form-control" name="disease_date"
                                   required>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-xxl-1 col-md-2">
                            <label for="height"> Рост </label>
                            <input id="height" type="text"
                                   class="form-control" placeholder="см" name="height"
                                   required>
                        </div>
                        <div class="col-xxl-1 col-md-2">
                            <label for="weight"> Вес </label>
                            <input id="weight" type="text"
                                   class="form-control" placeholder="кг" name="weight"
                                   required>
                        </div>
                        <div class="col-xxl-3 col-md-5">
                            <label for="type_body"> Тип конструкции </label>
                            <input id="type_body" type="text"
                                   class="form-control" name="type_body"
                                   required>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="disease" class="col-sm-1 col-form-label">Диагноз</label>
                        <div class="col-sm-10">
                            <input type="text" name="disease" class="form-control" id="disease">
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="extra_disease" class="col-sm-4 col-xxl-3 col-form-label">Сопутствующие
                            заболевания</label>
                        <div class="col-sm-8 col-xxl-8">
                            <input id="extra_disease" type="text" class="form-control" name="extra_disease"
                                   required>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label for="allergy" class="col-sm-2 col-xxl-1 col-form-label">Аллергия</label>
                        <div class="col-sm-10 col-xxl-10">
                            <input type="text" name="allergy" class="form-control" id="allergy">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="row col-xxl-3 col-md-4">
                            <label for="extra_disease" class="col-sm-4 col-xxl-4 col-form-label">Глюкоза</label>
                            <div class="col-sm-8 col-xxl-8">
                                <input id="extra_disease" type="text"
                                       class="form-control"
                                       name="extra_disease"
                                       required>
                            </div>
                        </div>
                        <div class="row col-xxl-3 col-md-3">
                            <label for="extra_disease" class="col-sm-2 col-xxl-2 col-form-label">АД</label>
                            <div class="col-sm-10 col-xxl-10">
                                <input id="extra_disease" type="text"
                                       class="form-control"
                                       name="extra_disease"
                                       required>
                            </div>
                        </div>
                        <div class="row col-xxl-3 col-md-3">
                            <label for="extra_disease" class="col-sm-2 col-xxl-2 col-form-label">Ps</label>
                            <div class="col-sm-10 col-xxl-10">
                                <input id="extra_disease" type="text"
                                       class="form-control"
                                       name="extra_disease"
                                       required>
                            </div>
                        </div>
                        <div class="row col-xxl-3 col-md-3">
                            <label for="extra_disease" class="col-sm-3 col-xxl-2 col-form-label">SpO</label>
                            <div class="col-sm-9 col-xxl-10">
                                <input id="extra_disease" type="text"
                                       class="form-control"
                                       name="extra_disease"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-3">
                            <label for="extra_disease" class="col-form-label">Сахарный диабет</label>
                            <div class="">
                                <select name="diabetes" class="form-select">
                                    <option>Отсутсвует</option>
                                    <option>Первичный</option>
                                    <option>Вторичный</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="dysphasia" class="col-form-label">Дисфазия</label>
                            <div class="">
                                <select name="dysphasia" class="form-select">
                                    <option>Отсутсвует</option>
                                    <option>Сенсорная</option>
                                    <option>Моторная</option>
                                    <option>Дизартрия</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="type_disorder" class="col-form-label">Нарушения</label>
                            <div class="">
                                <select name="type_disorder" class="form-select">
                                    <option>Двигательные</option>
                                    <option>Чувствительные</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="orientation" class="col-form-label">Нарушения ориентации</label>
                            <div class="">
                                <select name="orientation" class="form-select">
                                    <option>Отсутсвует</option>
                                    <option>В простанстве</option>
                                    <option>Во времени</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-xxl-3 col-md-3">
                            <label for="cardio_system" class="col-form-label">ССС</label>
                            <select name="cardio_system" class="form-select">
                                <option>Без патологий</option>
                                <option>АГ</option>
                                <option>ИБС</option>
                                <option>Фибрилляция предсердий</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Наличие</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stents" value="1"
                                       id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Стентов
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cardiostimulator" value="1"
                                       id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Кардиостимуляторов
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6 row">
                            <label for="edema" class="col-sm-2 col-xxl-2 col-form-label">Отеки</label>
                            <div class="col-sm-10 col-xxl-10">
                                <input id="edema" type="text"
                                       class="form-control"
                                       name="edema"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <div class="form-check">
                                    <input class="form-check-input" name="dyspnoea" type="checkbox" id="inlineCheckbox1"
                                           value="1">
                                    <label class="form-check-label" for="inlineCheckbox1">Отдышка</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="cough" type="checkbox" id="inlineCheckbox2"
                                           value="1">
                                    <label class="form-check-label" for="inlineCheckbox2">Кашель</label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-check">
                                    <input class="form-check-input" name="asthma" type="checkbox" id="inlineCheckbox3"
                                           value="1">
                                    <label class="form-check-label" for="inlineCheckbox3">Бронхиальная астма</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="smoking" type="checkbox" id="inlineCheckbox4"
                                           value="1">
                                    <label class="form-check-label" for="inlineCheckbox4">Курение</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

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
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    input[type="checkbox"] {
        margin: 0;
    }

</style>
