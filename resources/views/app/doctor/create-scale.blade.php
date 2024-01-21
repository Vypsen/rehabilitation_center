@extends('app.header')

@section('app')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-11" style="">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between ">
                            <h3 class="">
                                Новая шкала
                            </h3>
                            <button id="save-scale" type="submit" class="float-end btn btn-success"> Сохранить</button>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="mt-3">
                                <input id="name_scale" class="form-control fs-4" placeholder="Название"
                                       name="name">
                            </div>

                            <div class="mt-3">
                                <textarea id="descr_scale" class="form-control fs-6" placeholder="Описание"
                                          name="descr"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tasks">
                    @include('app.doctor.task', ['task_id' => 1])
                </div>

                <div class="w-100 text-center">
                    <a type="button" class="w-100 btn-success btn" id="add-task"
                       onclick="return false;"
                       href="">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            f()
            task_id = 2

            $('#add-task').click(function () {
                $.ajax({
                    url: 'task-view',
                    method: "get",
                    data: task_id,
                    success: function (response) {
                        $('#tasks').append(response)
                        f()
                        task_id += 1
                    }
                })
            })

            $('#save-scale').click(function () {
                var formData = []

                formData.push({'name_scale': $('#name_scale').val()})
                formData.push({'descr_scale': $('#descr_scale').val()})

                $('#tasks form').each(function (index, element) {

                    var data = $(element).serializeArray();

                    formData.push(data);
                })

                $.ajax({
                    url: 'create-scale',
                    type: 'POST',
                    data: {
                        formDataArray: formData,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            })

            function f() {
                $('.add-question').off('click').click(function () {
                    item = $(this).prev().children('.item-scale').first().clone();
                    console.log(item)
                    $(this).prev('.questions').append(item)
                })
            }


        })

    </script>

    <style>
        input:focus, textarea:focus {
            box-shadow: none !important;
            border-color: transparent !important;
        }

        input:not([type=radio]), textarea {
            background-color: transparent !important;
        }
    </style>
@endsection
