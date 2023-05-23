<?php

namespace App\Modules\Patient\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Mobility\Entities\Mobility;
use App\Modules\Patient\Entities\Patient;
use Auth;
use DB;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function viewPatient(Request $request)
    {
        $patient = Patient::query();
    }
}
