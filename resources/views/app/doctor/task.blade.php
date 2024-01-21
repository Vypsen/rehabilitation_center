<div id="" class="card my-4 position-relative box-scale">
    <form>

        <div id="task" class="card-body mt-4">
            <input type="text" name="task_name" placeholder="Задание или вопрос"
                   class="form-control fs-4" id="">
            <div class="questions" id="">
                <div id="item-scale" class=" item-scale d-flex mt-3">
                    <div
                        class="d-flex justify-content-center mx-3 align-items-center form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio3" disabled
                               value="option3">
                    </div>
                    <div class="d-flex w-100">
                        <div class="col-8 ">
                                            <textarea class="form-control" placeholder="..."
                                                      name="answers_task"></textarea>
                        </div>
                        <div class="col-4 ps-4">
                            <div class="d-flex">
                                <label for="" class="col-2 col-form-label">Баллы </label>
                                <div class="col-1">
                                    <input type="text" name="score_task" class="form-control" id="">
                                </div>
                                <div class="col-9 ps-3">
                                    <input class="form-control" placeholder="Пояснение для врача"
                                           name="score_descr_task">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a type="button" class="float-end btn-success btn add-question" id=""
               onclick="return false;"
               href="">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </form>
</div>
