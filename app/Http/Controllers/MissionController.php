<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MissionController extends Controller
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

    public function mission()
    {
        return view('mission');
    }
    public function getMission()
    {
        $data = DB::table('mission')
            ->leftJoin('contacts', 'mission.miss_contact', '=', 'contacts.con_id')
            ->select("*")
            ->get();
        $clifData = DB::table('cli_fnr')
                ->get();
        echo json_encode([$data, $clifData]);
        exit();
    }
    public function getMissionByMID(Request $request)
    {
        $data = DB::table('mission')
            ->leftJoin('contacts', 'mission.miss_contact', '=', 'contacts.con_id')
            ->select("*")
            ->where("miss_id", "=", $request->input('contact_id'))
            ->get();
        echo json_encode($data);
        exit();
    }
    
    public function getMissionByFilter(Request $request)
    {
        $filter = $request->input("filter");
        if ($filter=="all") {
            $data = DB::table('mission')
                ->leftJoin('contacts', 'mission.miss_contact', '=', 'contacts.con_id')
                ->select("*")
                ->get();
        } else {
            $data = DB::table('mission')
                ->leftJoin('contacts', 'mission.miss_contact', '=', 'contacts.con_id')
                ->select("*")
                ->where("miss_commercial", '=', $filter)
                ->get();
        }
        $clifData = DB::table('cli_fnr')
                ->get();
        echo json_encode([$data, $clifData]);
        exit();
    }
    public function getByClientSoft(Request $request)
    {
        $data = DB::table('cli_fnr')
            ->where('id', '=', $request->input("contact_id"))
            ->get();
        echo json_encode($data);
        exit();
    }
    public function saveData(Request $request)
    {
        $input = $request->all();
        DB::table('mission')->insert([
            'miss_id' => $input['mission_id'],
            'miss_name' => $input['nom_mission'],
            'miss_clif' => $input['client_final'],
            'miss_clis' => $input['client_soft'],
            'miss_contact' => $input['contact_client'],
            'miss_commercial' => $input['commercial'],
            'miss_datedeb' => $input['date_de_debut'],//
            'miss_datefin' => $input['date_de_fin'],
            'miss_maj' => date("Y-m-d"),
            'miss_com' => $input['commentaires']
        ]);
        return redirect()->back();
    }
    public function editData(Request $request)
    {
        $input = $request->all();
        DB::table('mission')->where("miss_id", $input['mission_id'])->update([
            'miss_name' => $input['nom_mission'],
            'miss_clif' => $input['client_final'],
            'miss_clis' => $input['client_soft'],
            'miss_contact' => $input['contact_client'],
            'miss_commercial' => $input['commercial'],
            'miss_datedeb' => $input['date_de_debut'],//
            'miss_datefin' => $input['date_de_fin'],
            'miss_maj' => date("Y-m-d"),
            'miss_com' => $input['commentaires']
        ]);
        return redirect()->back();
    }
    public function removeData(Request $request) 
    {
        $id = $request->input("id");
        DB::table('mission')->where('miss_id', '=', $id)->delete();
    }
    public function getDataForEdit(Request $request)
    {
        $id = $request->input("id");
        $data = DB::table('mission')
            ->where("miss_id", '=', $id)
            ->get();
        echo json_encode($data);
        exit();
    }
}
