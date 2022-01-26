<?php

namespace App\Http\Controllers;

use App\Models\F1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prodi = [];
        foreach($this->get_prodi() as $pro)
        {
            $a = $pro['nama_program_studi'];
            array_push($prodi,$a);
        }
        // dd($this->jumlah_alumni_per_prodi());
        $datas = [
            'prodi' => $prodi,
            'jumlah_mhs' => ($this->jumlah_mhs() == null) ? 0 : $this->jumlah_mhs(),
            'jumlah_alumni' => $this->jumlah_alumni(),
            'jumlah_alumni_per_prodi' => $this->jumlah_alumni_per_prodi(),
            'jumlah_alumni_per_kabupaten' => $this->jumlah_alumni_per_kabupaten(),
            'jumlah_alumni_per_provinsi' => $this->jumlah_alumni_per_provinsi(),
            'jumlah_alumni_per_jenispekerjaan' => $this->jumlah_alumni_per_jenispekerjaan(),
            'jumlah_alumni_per_jangkawaktu' => $this->jumlah_alumni_per_jangkawaktu(),
        ];
        // return response($datas);
        return view('home', compact('datas'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function jumlah_mhs()
    {
        $api = new ApiController;

        $req = [
            'act' => 'GetCountMahasiswa',
            'token' => $api->get_token(),
            'filter' => '',
            'limit' => '',
            'offset' => '',
        ];

        return $api->get_data_api($req);
        // $getCount = Http::get($api->base_uri().'/web-apis-guest/mhs-counter/'.date('Y'));
        // if($get)
        // dd($getCount['data'][0]['total']);
        // return $getCount;
    }

    public function jumlah_alumni()
    {
        $datas = F1::whereYear('tgl_wisuda', date('Y'))->count();
        return $datas;
    }

    public function jumlah_alumni_per_prodi()
    {
        $datas = F1::select(DB::raw('COUNT(*) as count, kode_prodi'))
                    ->groupBy('kode_prodi')
                    ->whereYear('tgl_wisuda', date('Y'))
                    ->get();
        
        $arr = array();
        foreach($datas as $data) {
            $a = [
                'name' => $data->kode_prodi == "74201" ? "Ilmu Hukum (S1)": "Hukum (S2)",
                'data' => [$data->count]
            ];
            array_push($arr, $a);
        }
        return $arr;
    }

    public function jumlah_alumni_per_kabupaten()
    {
        $base_uri = ApiController::base_uri();
        $datas = F1::select(DB::raw("COUNT(*) as count, kode_prodi"))
                    ->groupBy('kode_prodi')
                    ->where('province_id', 16)
                    ->get();

        $arr = array();
        foreach($datas as $data) {
            $a = [
                'name' => $data->kode_prodi == "74201" ? "Ilmu Hukum (S1)": "Hukum (S2)",
                'data' => [$data->count]
            ];
            array_push($arr, $a);
        }
        return $arr;
    }

    public function jumlah_alumni_per_provinsi()
    {
        $api = new ApiController;

        $arr = array();
        foreach($api->provinsi() as $provinsi) {
            $count = F1::where('province_id', $provinsi["id"])
                        ->whereYear('tgl_wisuda', date('Y'))
                        ->count();
            $a = [
                'name' => $provinsi["text"],
                'data' => [$count]
            ];
            array_push($arr, $a);
        }
        
        return $arr;
    }

    public function jumlah_alumni_per_jenispekerjaan()
    {
        $arr = array();

        $countNo = F1::whereNull('tempat_kerja')->count();
        $countYes = F1::whereNotNull('tempat_kerja')->count();

        $a = [
            'name' => 'Sudah Mendapat Kerja',
            'data' => [$countYes]
        ];
        array_push($arr, $a);

        $a = [
            'name' => 'Belum Mendapat Kerja',
            'data' => [$countNo]
        ];
        array_push($arr, $a);

        return $arr;
    }

    public function jumlah_alumni_per_jangkawaktu()
    {

    }

    public function get_prodi()
    {
        $api = new ApiController;

        $req = [
            'act' => 'GetProdi',
            'token' => $api->get_token(),
            'filter' => '',
            'limit' => '',
            'offset' => '',
        ];

        return $api->get_data_api($req);
    }

    public function total_per_provinsi($provinsi_id = 0)
    {
        $total = F1::where('province_id', $provinsi_id)
                    ->where('tgl_wisuda', date('y'))
                    ->count();

        return $total;
    }

    public function total_per_kabupaten($kabupaten_id = 0)
    {
        $total = F1::where('regency_id', $kabupaten_id)
                    ->where('tgl_wisuda', date('Y'))
                    ->count();

        return $total;
    }
}
