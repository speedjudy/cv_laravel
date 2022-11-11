<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
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

    public function demand()
    {
        return view('demand');
    }
    public function getCommercial()
    {
        $data = DB::table('cv_list')
            ->select('cv_list.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getDemand()
    {
        $data = DB::table('dde')
            ->join('cv_list', 'cv_list.id_cv', '=', 'dde.dde_commercial')
            ->join('profilrech', 'profilrech.pfr_id', '=', 'dde.dde_profilrech')
            ->select('dde.*', 'cv_list.cv_nom', 'profilrech.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getContactClient()
    {
        $data = DB::table('contacts')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getClientFinal()
    {
        $data = DB::table('cli_fnr')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getListByFilter(Request $request)
    {
        $data = DB::table('cv_list')
            ->join('xp', 'cv_list.id_xp', '=', 'xp.id_xp')
            ->join('statuts', 'cv_list.id_statut', '=', 'statuts.id_statut')
            ->select('cv_list.*', 'xp.xp_name', 'statuts.statut_name')
            ->get();
        $profils_data = DB::table('cv_profils')
                ->get();
        $langues_data = DB::table('cv_langues')
                ->get();
        $lgprogs_data = DB::table('cv_lgprogs')
                ->get();
        $outils_data = DB::table('cv_outils')
                ->get();
        $envs_data = DB::table('cv_envs')
                ->get();
        echo json_encode([$data, $profils_data, $langues_data, $lgprogs_data, $outils_data, $envs_data]);
        exit();
    }
    public function getByContactClient(Request $request)
    {
        $data = DB::table('contacts')
            ->where('con_id', '=', $request->input("contact_id"))
            ->get();
        echo json_encode($data);
        exit();
    }
    public function saveData(Request $request)
    {
        $input = $request->all();
        DB::table('dde')->insert([
            'dde_ref' => $input['reference_demande_'],
            'dde_date' => $input['date_demande'],
            'dde_clif' => $input['client_final'],
            'dde_commercial' => $input['commercial'],
            'dde_clis' => $input['client_soft'],
            'dde_nbpostes' => $input['nb_de_postes'],//
            'dde_contact' => $input['contact_client'],
            'dde_lieu' => $input['lieu'],
            'dde_mobilite' => $input['mobilite'],
            'dde_profilrech' => $input['demand_id'],
            'dde_duree' => $input['duree'],
            'dde_puv' => $input['puv'],
            'dde_com' => $input['commentaires'],
            'dde_date_ferm' => date("Y-m-d"),
            'dde_ferm_typ' => '',
            'dde_miss_id' => '',
            'dde_maj' => date("Y-m-d")
        ]);
        DB::table('profilrech')->insert([
            'pfr_id' => $input['demand_id'],
            'pfr_lib' => $input['nom_profil'],
            'pfr_xp' => $input['addExperience'][0]!=""?"(".implode(",",$input['addExperience']).")":"",
            'pfr_prf' => $input['addProfil'][0]!=""?"(".implode(",",$input['addProfil']).")":"",
            'pfr_lge' => $input['addLanguages'][0]!=""?"(".implode(",",$input['addLanguages']).")":"",
            'pfr_deb' => date("Y-m-d"),
            'pfr_deb_asap' => $input['asap'],
            'pfr_outi' => $input['addOutils'][0]!=""?"(".implode(",",$input['addOutils']).")":"",
            'pfr_env' => $input['addEnvironments'][0]!=""?"(".implode(",",$input['addEnvironments']).")":"",
            'pfr_lgprog' => $input['addLanguagePro'][0]!=""?"(".implode(",",$input['addLanguagePro']).")":"",
            'pfr_pua' => $input['pua']
        ]);
        return redirect()->back();
    }
    public function editData(Request $request)
    {
        $input = $request->all();
        DB::table('dde')->where('dde_id', $input['demand_id'])->update([
            'dde_ref' => $input['reference_demande_'],
            'dde_date' => $input['date_demande'],
            'dde_clif' => $input['client_final'],
            'dde_commercial' => $input['commercial'],
            'dde_clis' => $input['client_soft'],
            'dde_nbpostes' => $input['nb_de_postes'],//
            'dde_contact' => $input['contact_client'],
            'dde_lieu' => $input['lieu'],
            'dde_mobilite' => $input['mobilite'],
            'dde_profilrech' => $input['demand_id'],
            'dde_duree' => $input['duree'],
            'dde_puv' => $input['puv'],
            'dde_com' => $input['commentaires'],
            'dde_date_ferm' => date("Y-m-d"),
            'dde_ferm_typ' => '',
            'dde_miss_id' => '',
            'dde_maj' => date("Y-m-d")
        ]);
        DB::table('profilrech')->where('pfr_id', $input['demand_id'])->update([
            'pfr_xp' => $input['addExperience'][0]!=""?"(".implode(",",$input['addExperience']).")":"",
            'pfr_prf' => $input['addProfil'][0]!=""?"(".implode(",",$input['addProfil']).")":"",
            'pfr_lge' => $input['addLanguages'][0]!=""?"(".implode(",",$input['addLanguages']).")":"",
            'pfr_deb' => date("Y-m-d"),
            'pfr_deb_asap' => $input['asap'],
            'pfr_outi' => $input['addOutils'][0]!=""?"(".implode(",",$input['addOutils']).")":"",
            'pfr_env' => $input['addEnvironments'][0]!=""?"(".implode(",",$input['addEnvironments']).")":"",
            'pfr_lgprog' => $input['addLanguagePro'][0]!=""?"(".implode(",",$input['addLanguagePro']).")":"",
            'pfr_pua' => $input['pua']
        ]);
        return redirect()->back();
    }
    
    public function getDataForEdit(Request $request)
    {
        $id = $request->input("id");
        $ddeData = DB::table('dde')->where('dde_id', '=', $id)->get();
        $profilrechData = DB::table('profilrech')->where('pfr_id', '=', $id)->get();
        echo json_encode([$ddeData, $profilrechData]);
        exit();
    }
    public function removeDemand(Request $request) 
    {
        $id = $request->input("id");
        DB::table('dde')->where('dde_id', '=', $id)->delete();
        DB::table('profilrech')->where('pfr_id', '=', $id)->delete();
    }
}
