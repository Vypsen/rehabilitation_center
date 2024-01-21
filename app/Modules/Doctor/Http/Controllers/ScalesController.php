<?php

namespace App\Modules\Doctor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScalesController extends Controller
{

    public function createScaleView()
    {
        return view('app.doctor.create-scale');
    }

    public function createScale(Request $request)
    {
        return $request->post()['formDataArray'][0]['name_scale'];
        $name = $request->post('name');
        $answers = $request->post('answers');
        $score = $request->post('score');
        $score_descr = $request->post('score_descr');


        foreach ($answers as $index => $answer) {

        }
        return $request->post();
    }

    public function getTaskView(Request $request)
    {
        return view('app.doctor.task', ['task_id' => $request->get('task_id')]);
    }
}
