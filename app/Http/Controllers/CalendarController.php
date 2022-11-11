<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
    }

    public function calendar()
    {
        return view('calendar');
    }
    public function getType()
    {
        $data = DB::table('j_type')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function save(Request $request)
    {
        $input = $request->all();
        $data = DB::table('j_spe')
            ->where("cv_id", "=", $input['cv_id'])
            ->where('spe_date', '=', $input['day'])
            ->where('spe_period', '=', $input['spe_period'])
            ->get();
        if (count($data)==0) {
            DB::table('j_spe')->insert([
                'cv_id' => $input['cv_id'],
                'spe_date' => $input['day'],
                'spe_period' => $input['spe_period'],
                'j_type_id' => $input['value']
            ]);
        } else {
            DB::table('j_spe')->where("cv_id", "=", $input['cv_id'])->where('spe_date', '=', $input['day'])->where('spe_period', '=', $input['spe_period'])->update([
                'cv_id' => $input['cv_id'],
                'spe_date' => $input['day'],
                'spe_period' => $input['spe_period'],
                'j_type_id' => $input['value']
            ]);
        }
    }
    public function getData(Request $request)
    {
        $input = $request->all();
        $data = DB::table('j_spe')
            ->where("cv_id", "=", $input['cv_id'])
            ->where('spe_date', 'like', $input['day'].'%')
            ->get();
        echo json_encode($data);
        exit();
    }
}
