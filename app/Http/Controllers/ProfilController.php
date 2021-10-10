<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Dosen;
use App\Models\F1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $HOST = 'http://103.153.244.10:8082/ws/live2.php';
    public $ALL_ALUMNI = '/api/sisfo-guest/alumni/semua';
    public $NIM_ALUMNI = '/api/sisfo-guest/alumni/nim/';
    // public $ALL_ALUMNI = 'http://sisfo-access.stihpada.web.id:8085/api/alumni/semua';
    // public $NIM_ALUMNI = 'http://sisfo-access.stihpada.web.id:8085/api/alumni/nim/';
    public $TOKEN = "Bearer NyFLEG9xE8D4MfxD2HVRfpjbV4hx0KTMB94sBFVc";

    public function get_allalumni()
    {
        $datas = Http::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => $this->TOKEN
        ])->post($this->ALL_ALUMNI);

        return $datas->json()['data'];
    }

    public function get_alumni_with_nim($nim)
    {
        $base_uri = ApiController::base_uri();
        // dd($base_uri.$this->NIM_ALUMNI.$nim);
        $data = Http::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => $this->TOKEN
        ])->get($base_uri.$this->NIM_ALUMNI.$nim);

        return $data->json();
    }

    public function get_token()
    {
        $token = Http::post($this->HOST,[
            'act'=>'GetToken',
            'username'=>'023024',
            'password'=>'stihpada28'
        ]);

        return $token->json()['data']['token'];
    }

    public function get_api($data = array())
    {
        $profilpt = Http::post($this->HOST, [
            "act"=>$data['act'],
            "token"=>$data['token'],
            "filter"=>$data['filter'],
            "limit"=>$data['limit'],
            "offset"=>$data['offset']
        ]);

        return $profilpt->json()['data'];
    }

    public function index()
    {
        $alumni = $this->get_alumni_with_nim(auth()->user()->name);
        if(array_key_exists('errors', $alumni)) {
            $alumniIsExists = false;
        } else {
            $alumniIsExists = true;
        }
        // dd($alumni);
        $token = $this->get_token();
        $profilpt = $this->get_api([
            'token'=>$token,
            'act'=>'GetProfilPT',
            'filter'=>'',
            'limit'=>'',
            'offset'=>0
        ]);

        $prodi = $this->get_api([
            'token'=>$token,
            'act'=>'GetProdi',
            'filter'=>'',
            'limit'=>'2',
            'offset'=>0
        ]);

        $dosens = Dosen::all();
        $agamas = Agama::all();
        $f1 = F1::whereNim(auth()->user()->name)->first();
        // dd($profilpt);
        return view('profil', compact(
            'profilpt',
            'prodi',
            'dosens',
            'agamas',
            'alumni',
            'f1',
            'alumniIsExists'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
