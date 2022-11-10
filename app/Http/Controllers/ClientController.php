<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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

    public function client()
    {
        return view('client');
    }
    public function getClient(Request $request)
    {
        $data = DB::table('cli_fnr')
            ->select('cli_fnr.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function getClientForEdit(Request $request)
    {
        $id = $request->input("id");
        $data = DB::table('cli_fnr')
            ->select('cli_fnr.*')
            ->where('id', '=', $id)
            ->get();
        $contact = DB::table('contacts')
            ->select('contacts.*')
            ->where('cli_id', '=', $id)
            ->get();
        echo json_encode([$data, $contact]);
        exit();
    }
    
    public function removeClient(Request $request) 
    {
        $id = $request->input("id");
        DB::table('cli_fnr')->where('id', '=', $id)->delete();
        DB::table('contacts')->where('cli_id', '=', $id)->delete();
    }
    public function saveClient(Request $request)
    {
        $input = $request->all();
        DB::table('cli_fnr')->insert([
            'id' => $input['client_id'],
            'cli_rs' => $input['social_reason'],
            'cli_adr' => $input['address'],
            'cli_cp' => $input['cp'],
            'cli_vil' => $input['ville'],
            'cli_tel' => $input['tel'],
            'cli_fax' => $input['fax'],
            'cli_siret' => $input['siret'],
            'typ_fnr' => $input['fournisseur'],
            'cli_actif' => $input['actif']
        ]);
        DB::table('contacts')->insert([
            'cli_id' => $input['client_id'],
            'con_nom' => $input['contact_nom'],
            'con_prenom' => $input['contact_prenom'],
            'con_fonc' => $input['contact_fonction'],
            'con_tel' => $input['contact_tel_fix'],
            'con_port' => $input['contact_tel_port'],
            'con_mail' => $input['contact_email'],
            'con_fax' => $input['contact_fax']
        ]);
        return redirect()->back();
    }
    public function editClient(Request $request)
    {
        $input = $request->all();
        DB::table('cli_fnr')->where('id', $input['client_id'])->update([
            'cli_rs' => $input['social_reason'],
            'cli_adr' => $input['address'],
            'cli_cp' => $input['cp'],
            'cli_vil' => $input['ville'],
            'cli_tel' => $input['tel'],
            'cli_fax' => $input['fax'],
            'cli_siret' => $input['siret'],
            'typ_fnr' => $input['fournisseur'],
            'cli_actif' => $input['actif']
        ]);
        DB::table('contacts')->where('cli_id', $input['client_id'])->update([
            'con_nom' => $input['contact_nom'],
            'con_prenom' => $input['contact_prenom'],
            'con_fonc' => $input['contact_fonction'],
            'con_tel' => $input['contact_tel_fix'],
            'con_port' => $input['contact_tel_port'],
            'con_mail' => $input['contact_email'],
            'con_fax' => $input['contact_fax']
        ]);
        return redirect()->back();
    }
}
