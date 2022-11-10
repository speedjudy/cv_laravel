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
            ->where('cli_actif', '=' , $request->input("activeFlag"))
            ->get();
        echo json_encode($data);
        exit();
    }
    public function removeClient(Request $request) 
    {
        $id = $request->input("id");
        DB::table('cli_fnr')->where('id', '=', $id)->delete();
    }
}
