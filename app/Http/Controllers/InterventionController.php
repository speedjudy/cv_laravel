<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterventionController extends Controller
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

    public function intervention()
    {
        return view('intervention');
    }
    public function getIntervention()
    {
        $data = DB::table('inter')
            ->leftJoin('mission', 'inter.miss_id', '=', 'mission.miss_id')
            ->leftJoin('cv_list', 'inter.cv_id', '=', 'cv_list.id_cv')
            ->leftJoin('statuts', 'inter.int_statut', '=', 'statuts.id_statut')
            ->leftJoin('cli_fnr', 'inter.int_fnr', '=', 'cli_fnr.id')
            ->leftJoin('profils', 'inter.int_profil', '=', 'profils.id_profil')
            ->select("*")
            ->get();
        $clifData = DB::table('cli_fnr')
            ->get();
        echo json_encode([$data, $clifData]);
        exit();
    }
    public function getCommercialDetail(Request $request)
    {
        $data = DB::table('cv_list')
            ->where("id_cv", "=", $request->input('contact_id'))
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getFournisseur(Request $request)
    {
        $data = DB::table('cli_fnr')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function saveData(Request $request)
    {
        $input = $request->all();
        echo "<pre>";
        print_r($input);die();
        DB::table('inter')->insert([
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
}
