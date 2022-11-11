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
    public function getDataForEdit(Request $request)
    {
        $id = $request->input("id");
        $data = DB::table('inter')
            ->where("int_id", '=', $id)
            ->get();
        echo json_encode($data);
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
        DB::table('inter')->insert([
            'int_id' => $input['intervention_id'],
            'miss_id' => $input['mission'],
            'cv_id' => $input['nom_prenom'],
            'int_statut' => $input['statut'],
            'int_fnr' => $input['fournisseur'],
            'int_profil' => $input['profil_intervention'],
            'int_pua' => $input['pua'],//
            'int_puv' => $input['puv'],
            'int_deb' => $input['date_de_debut'],
            'int_fin' => $input['date_de_fin'],
            'int_bdc' => $input['ref_bon_de_commande'],
            'int_fact' => $input['ref_facture'],
            'int_com' => $input['commentaires'],
            'int_maj' => date("Y-m-d")
        ]);
        return redirect()->back();
    }
    public function editData(Request $request)
    {
        $input = $request->all();
        DB::table('inter')->where("int_id", "=" ,$input['intervention_id'])->update([
            'miss_id' => $input['mission'],
            'cv_id' => $input['nom_prenom'],
            'int_statut' => $input['statut'],
            'int_fnr' => $input['fournisseur'],
            'int_profil' => $input['profil_intervention'],
            'int_pua' => $input['pua'],//
            'int_puv' => $input['puv'],
            'int_deb' => $input['date_de_debut'],
            'int_fin' => $input['date_de_fin'],
            'int_bdc' => $input['ref_bon_de_commande'],
            'int_fact' => $input['ref_facture'],
            'int_com' => $input['commentaires'],
            'int_maj' => date("Y-m-d")
        ]);
        return redirect()->back();
    }
    public function remove(Request $request) 
    {
        $id = $request->input("id");
        DB::table('inter')->where('int_id', '=', $id)->delete();
    }
}
