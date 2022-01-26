<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public $HOST = 'http://103.153.244.10:8082/ws/live2.php';
    public $API_PROVINSI = 'https://sisfo-access.stihpada.web.id:8100/indonesia-guest/provinsi';

    public static function base_uri()
    {
        return 'https://sisfo-access.stihpada.web.id:8100';
    }

    public static function token()
    {
        return '3|b4AK0Pkc0Ye0r8YCH4i8whhKFxBrZPqGKIpHla13';
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

    public function get_data_api($data = array())
    {
        $data = Http::post($this->HOST, [
            "act"=>$data['act'],
            "token"=>$data['token'],
            "filter"=>$data['filter'],
            "limit"=>$data['limit'],
            "offset"=>$data['offset']
        ]);

        return $data->json()['data'];
    }

    public function result(Request $request)
    {
        $req = [
            'act' => $request->act,
            'token' => $this->get_token(),
            'filter' => $request->filter,
            'limit' => $request->limit,
            'offset' => $request->offset,
        ];

        $data = $this->get_data_api($req);

        return response()->json([
            'response' => $data,
            'metadata' => [
                'message' => 'Ok',
                'code' => 200,
            ],
        ], 200);
    }

    public function provinsi($id=null)
    {
        if($id == null) {
            $provinsi = Http::get($this->API_PROVINSI);
        }

        return $provinsi['results'];
    }
}
