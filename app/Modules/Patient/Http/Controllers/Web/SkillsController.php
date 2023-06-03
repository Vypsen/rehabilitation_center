<?php

namespace App\Modules\Patient\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Patient\Entities\Skills;
use Auth;
use DB;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function viewSkills(Request $request)
    {
        $skillsName = DB::table('skills_name')->get();

        $usersSkills = Auth::user()->lastSkills();
        return view('app.skills', ['skills' => $skillsName, 'usersSkills' => $usersSkills]);
    }

    public function setSkills(Request $request)
    {
        $data = $request->all();

        $mobility = new Skills();
        $mobility->patient_id = Auth::user()->id;
        $mobility->fill($data);

        $mobility->save();
        return redirect(route('skills'));
    }
}
