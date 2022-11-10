<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
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

    public function cv()
    {
        return view('cv');
    }
    public function getCVList()
    {
        $data = DB::table('cv_list')
            ->join('xp', 'cv_list.id_xp', '=', 'xp.id_xp')
            ->join('statuts', 'cv_list.id_statut', '=', 'statuts.id_statut')
            ->select('cv_list.*', 'xp.xp_name', 'statuts.statut_name')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getCVListBySearch()
    {
        $data = DB::table('cv_list')
            ->join('xp', 'cv_list.id_xp', '=', 'xp.id_xp')
            ->join('statuts', 'cv_list.id_statut', '=', 'statuts.id_statut')
            ->select('cv_list.*', 'xp.xp_name', 'statuts.statut_name')
            ->get();

        $clients_data = DB::table('cv_clients')
                ->get();
        $envs_data = DB::table('cv_envs')
                ->get();
        $langues_data = DB::table('cv_langues')
                ->get();
        $lgprogs_data = DB::table('cv_lgprogs')
                ->get();
        $outils_data = DB::table('cv_outils')
                ->get();
        $profils_data = DB::table('cv_profils')
                ->get();
        $tags_data = DB::table('cv_tags')
                ->get();
        print_r(json_encode([$data, $clients_data, $envs_data, $langues_data, $lgprogs_data, $outils_data, $profils_data, $tags_data]));exit();
    }
    public function getTags()
    {
        $data = DB::table('tags')
            ->select('tags.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getProfils()
    {
        $data = DB::table('profils')
            ->select('profils.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getExperience()
    {
        $data = DB::table('xp')
            ->select('xp.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getStatus()
    {
        $data = DB::table('statuts')
            ->select('statuts.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getClients()
    {
        $data = DB::table('cli_fnr')
            ->select('cli_fnr.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getLanguages()
    {
        $data = DB::table('langues')
            ->select('langues.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getEnvironments()
    {
        $data = DB::table('envs')
            ->select('envs.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getOutils()
    {
        $data = DB::table('outils')
            ->select('outils.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getLanguagePro()
    {
        $data = DB::table('lgprogs')
            ->select('lgprogs.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function saveCV(Request $request)
    {
        $input = $request->all();
        DB::table('cv_list')->insert([
            'id_cv' => $input['add_cv_n'],
            'cv_maj' => $input['add_derniere'],
            'cv_indispo' => $input['add_indis'],
            'cv_nom' => $input['add_nom'],
            'cv_prenom' => $input['add_prenom'],
            'cv_ss' => $input['add_nss'],//
            'cv_naiss' => $input['add_dateNaiss'],
            'cv_adresse' => $input['add_address'],
            'cv_fix' => $input['add_telFixe'],
            'cv_com' => $input['add_port'],
            'cv_nat' => $input['add_nationalite'],
            'cv_mob' => $input['add_cp'],
            'cv_loc' => $input['add_ville'],
            'cv_email' => $input['add_email'],
            'cv_emailsoft' => $input['add_emailSoft'],
            'id_statut' => $input['add_statut'],
            'id_fnr' => $input['add_fournisseur'],
            'permisB' => $input['add_permit'],
            'tjm' => $input['add_puv'],
            'cjm' => $input['add_pua'],
            'id_xp' => $input['add_experience'],
            'cv_dispo' => $input['add_dateDisponibilite'],
            'cv_creation' => $input['add_cree']
        ]);
        foreach ($input['addProfil'] as $item) {
            DB::table('cv_profils')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_profil' => $item
            ]);
        }
        foreach ($input['addClients'] as $item) {
            DB::table('cv_clients')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_client' => $item,
                'insert_auto' => "False"
            ]);
        }
        foreach ($input['addLanguages'] as $item) {
            DB::table('cv_langues')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_langue' => $item,
                'level' => "Technique"
            ]);
        }
        foreach ($input['addEnvironments'] as $item) {
            DB::table('cv_envs')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_env' => $item
            ]);
        }
        foreach ($input['addOutils'] as $item) {
            DB::table('cv_outils')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_outil' => $item
            ]);
        }
        foreach ($input['addLanguagePro'] as $item) {
            DB::table('cv_lgprogs')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_lgprog' => $item
            ]);
        }
        foreach ($input['addTags'] as $item) {
            DB::table('cv_tags')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_tag' => $item
            ]);
        }
        return redirect()->back();
    }
    public function editCV(Request $request)
    {
        $input = $request->all();
        DB::table('cv_list')->where('id_cv', $input['add_cv_n'])->update([
            'cv_maj' => $input['add_derniere'],
            'cv_indispo' => $input['add_indis'],
            'cv_nom' => $input['add_nom'],
            'cv_prenom' => $input['add_prenom'],
            'cv_ss' => $input['add_nss'],//
            'cv_naiss' => $input['add_dateNaiss'],
            'cv_adresse' => $input['add_address'],
            'cv_fix' => $input['add_telFixe'],
            'cv_com' => $input['add_port'],
            'cv_nat' => $input['add_nationalite'],
            'cv_mob' => $input['add_cp'],
            'cv_loc' => $input['add_ville'],
            'cv_email' => $input['add_email'],
            'cv_emailsoft' => $input['add_emailSoft'],
            'id_statut' => $input['add_statut'],
            'id_fnr' => $input['add_fournisseur'],
            'permisB' => $input['add_permit'],
            'tjm' => $input['add_puv'],
            'cjm' => $input['add_pua'],
            'id_xp' => $input['add_experience'],
            'cv_dispo' => $input['add_dateDisponibilite'],
            'cv_creation' => $input['add_cree']
        ]);
        DB::table('cv_clients')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_envs')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_langues')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_lgprogs')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_outils')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_profils')->where('id_cv', '=', $input['add_cv_n'])->delete();
        DB::table('cv_tags')->where('id_cv', '=', $input['add_cv_n'])->delete();
        foreach ($input['addProfil'] as $item) {
            DB::table('cv_profils')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_profil' => $item
            ]);
        }
        foreach ($input['addClients'] as $item) {
            DB::table('cv_clients')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_client' => $item,
                'insert_auto' => "False"
            ]);
        }
        foreach ($input['addLanguages'] as $item) {
            DB::table('cv_langues')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_langue' => $item,
                'level' => "Technique"
            ]);
        }
        foreach ($input['addEnvironments'] as $item) {
            DB::table('cv_envs')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_env' => $item
            ]);
        }
        foreach ($input['addOutils'] as $item) {
            DB::table('cv_outils')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_outil' => $item
            ]);
        }
        foreach ($input['addLanguagePro'] as $item) {
            DB::table('cv_lgprogs')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_lgprog' => $item
            ]);
        }
        foreach ($input['addTags'] as $item) {
            DB::table('cv_tags')->insert([
                'id_cv' => $input['add_cv_n'],
                'id_tag' => $item
            ]);
        }
        return redirect()->back();
    }
    public function removeCV(Request $request) 
    {
        $id = $request->input("id");
        DB::table('cv_list')->where('id_cv', '=', $id)->delete();
        DB::table('cv_clients')->where('id_cv', '=', $id)->delete();
        DB::table('cv_envs')->where('id_cv', '=', $id)->delete();
        DB::table('cv_langues')->where('id_cv', '=', $id)->delete();
        DB::table('cv_lgprogs')->where('id_cv', '=', $id)->delete();
        DB::table('cv_outils')->where('id_cv', '=', $id)->delete();
        DB::table('cv_profils')->where('id_cv', '=', $id)->delete();
        DB::table('cv_tags')->where('id_cv', '=', $id)->delete();
    }
    public function getCVForEdit(Request $request) 
    {
        $id = $request->input("id");
        $cv_data = DB::table('cv_list')
                ->where('id_cv', '=', $id)
                ->get();
        $clients_data = DB::table('cv_clients')
                ->where('id_cv', '=', $id)
                ->get();
        $envs_data = DB::table('cv_envs')
                ->where('id_cv', '=', $id)
                ->get();
        $langues_data = DB::table('cv_langues')
                ->where('id_cv', '=', $id)
                ->get();
        $lgprogs_data = DB::table('cv_lgprogs')
                ->where('id_cv', '=', $id)
                ->get();
        $outils_data = DB::table('cv_outils')
                ->where('id_cv', '=', $id)
                ->get();
        $profils_data = DB::table('cv_profils')
                ->where('id_cv', '=', $id)
                ->get();
        $tags_data = DB::table('cv_tags')
                ->where('id_cv', '=', $id)
                ->get();
        print_r(json_encode([$cv_data, $clients_data, $envs_data, $langues_data, $lgprogs_data, $outils_data, $profils_data, $tags_data]));exit();
    }
}
