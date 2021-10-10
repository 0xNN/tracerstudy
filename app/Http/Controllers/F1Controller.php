<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\F1;
use App\Imports\F1Import;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Excel;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class F1Controller extends Controller
{
    public $ALL_ALUMNI = 'http://sisfo-access.stihpada.web.id:8099/api/sisfo-guest/alumni/semua';
    public $TOKEN = "Bearer 3|b4AK0Pkc0Ye0r8YCH4i8whhKFxBrZPqGKIpHla13";
    // public $TOKEN = "Bearer 4|ZBOcFLhtRSFwf0LFv90QbYlvYPaUvAbyAZNYWinR";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sync_alumni()
    {
        $datass = Http::withHeaders([
            // "Authorization" => $this->TOKEN,
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            ])->get($this->ALL_ALUMNI);

        // dd($datass->json()['last_page']);
        $from = 1;
        $last_page = $datass->json()['last_page'];
        // dd($last_page);
        // $datas
        // dd($datas->json()['data'][0]);
        $totalSuccess = 0;
        $totalFail = 0;

        try {
            while($from <= $last_page) {
                $url = $this->ALL_ALUMNI.'?page='.$from;
                // dd($url);
                $datas = Http::withHeaders([
                    // "Authorization" => $this->TOKEN,
                    "Content-Type" => "application/json",
                    "Accept" => "application/json",
                ])->get($url);
                foreach($datas->json()['data'] as $data)
                {
                    // dd($data['nim']);
                    $user = User::whereName($data['nim'])->first();
                    // dd($user);
                    // dd(empty($user));
                    if(is_null($user))
                    {
                        // dd($user);
                        User::create([
                            'name' => $data['nim'],
                            'email' => $data['email'],
                            'password' => Hash::make($data['nim']),
                            'is_admin' => 0,
                        ]);

                        $totalSuccess = $totalSuccess + 1;
                    }
                    else {
                        $totalFail = $totalFail + 1;
                    }
                }
                $from = $from + 1;
            }
        } catch(Exception $e) {
            return response()->json($e->getMessage());
        }
        return response()->json([
            'totalSuccess' => $totalSuccess,
            'totalFail' => $totalFail,
            'success' => true,
        ], 200);
        // dd($datas->json()['data']);
    }

    public function index(Request $request)
    {
        $f1 = F1::all();
        if ($request->ajax()){
            return datatables()->of($f1)->addColumn('action', function($data){
                            // $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                            $button = '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            return $button;
                        })
                        ->editColumn('jenis_kelamin_id', function($data) {
                            if($data->jenis_kelamin_id == 1)
                            {
                                return 'L';
                            }
                            else if($data->jenis_kelamin_id == 2)
                            {
                                return 'P';
                            }
                            else {
                                return 'Tidak Diketahui';
                            }
                        })
                        ->rawColumns(['action','jenis_kelamin_id'])
                        ->addIndexColumn()
                        ->make(true);
                    }
                    return view('alumni');
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
        $validator = Validator::make($request->all(), [
            'f1_foto' => 'required|mimes:jpg,jpeg,png|max:150'
        ],[
            'f1_foto.max' => 'Ukuran foto tidak boleh lebih dari 150 Kb',
            'f1_foto.required' => 'Foto belum dipilih',
            'f1_foto.mimes' => 'File harus berupa JPG/JPEG/PNG'
        ]);

        if($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $id = $request->id;

        // $thn_lulus = date('Y', strtotime($request->f1_tanggalwisuda));
        $thn_lulus = $request->f1_thnlulus;

        $name = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('f1_foto')->getClientOriginalName());

        $request->file('f1_foto')->move(public_path('images'), $name);
        //$fileName = time().'_'.$request->file('f1_foto')->getClientOriginalName();

        //$filePath = $request->file('f1_foto')->storeAs('uploads', $fileName, 'public');

        $post   =   F1::updateOrCreate(['nim' => $request->f1_nim],
                    [
                        'nim' => $request->f1_nim,
                        'nik' => $request->f1_nik,
                        'nisn' => $request->f1_nisn,
                        'npwp' => $request->f1_npwp,
                        'angkatan' => $request->f1_angkatan,
                        'th_akademik' => $request->f1_tahunakademik,
                        'nama_mahasiswa' => $request->f1_nama,
                        'jenis_kelamin_id' => ($request->f1_jk === 'Perempuan') ? 2 : 1,
                        'kode_prodi' => $request->f1_kodeprodi,
                        'kurikulum' => $request->f1_kurikulum,
                        'tmp_lahir' => $request->f1_tempatlahir,
                        'tgl_lahir' => $request->f1_tanggallahir,
                        'agama_id' => $request->f1_agama,
                        'kode_pt' => $request->f1_kodept,
                        'kewarganegaraan' => $request->f1_kewarganegaraan,
                        'province_id' => $request->f1_provinsi,
                        'regency_id' => $request->f1_kabupaten,
                        'alamat' => $request->f1_alamat,
                        'pendidikan_terakhir' => $request->f1_pendidikanterakhir,
                        'gol_darah' => $request->f1_golongandarah,
                        'dosen_id' => $request->f1_pembimbing,
                        'thn_lulus' => $thn_lulus,
                        'tgl_terima' => $request->f1_tanggalditerima,
                        'tgl_selesai' => $request->f1_tanggalselesai,
                        'tgl_wisuda' => $request->f1_tanggalwisuda,
                        'tgl_kompre' => $request->f1_tanggalkompre,
                        'no_hp' => $request->f1_nomorhp,
                        'kode_pt' => $request->f1_kodept,
                        'email' => $request->f1_email,
                        'foto_alumni' => url("/images/".$name),
                        'ipk' => $request->f1_ipk,
                        'no_ijazah' => $request->f1_nomorijazah,
                        'tempat_kerja' => $request->f1_namatempatbekerja,
                        'no_telp_tmpt_kerja' => $request->f1_nomorteleponperusahaan,
                        'jabatan' => $request->f1_jabatan,
                        'tgl_masuk_kerja' => $request->f1_tanggalmasukkerja,
                        'alamat_tempat_kerja' => $request->f1_alamattempatbekerja,
                        'nik_ayah' => $request->f1_nikayah,
                        'nama_ayah' => $request->f1_namaayah,
                        'tgl_lahir_ayah' => $request->f1_tanggallahirayah,
                        'pekerjaan_ayah' => $request->f1_pekerjaanayah,
                        'pendidikan_ayah' => $request->f1_pendidikanayah,
                        'penghasilan_ayah' => $request->f1_penghasilanayah,
                        'alamat_ayah' => $request->f1_alamatayah,
                        'nik_ibu' => $request->f1_nikibu,
                        'nama_ibu' => $request->f1_namaibu,
                        'tgl_lahir_ibu' => $request->f1_tanggallahiribu,
                        'pekerjaan_ibu' => $request->f1_pekerjaanibu,
                        'pendidikan_ibu' => $request->f1_pendidikanibu,
                        'penghasilan_ibu' => $request->f1_penghasilanibu,
                        'alamat_ibu' => $request->f1_alamatibu,
                        'isset_from_alumni' => 1,
                        'isset_from_admin' => (auth()->user()->is_admin === 1) ? 1 : 0,
                        'user_id' => auth()->user()->id,
                        'user_modify' => auth()->user()->name,
                    ]);
        return back()
                    ->with('success', 'Data berhasil di-update.');

        //return response()->json($post);
    }

    public function simpan(Request $request)
    {
        $post   =   F1::updateOrCreate(['id' => $id],
                    [
                        'kode_pt' => $request->f1_kodept,
                        'nim_mahasiswa' => $request->f1_nim,
                        'nama_mahasiswa' => $request->f1_nama,
                        'jenis_kelamin' => $request->f1_jk,
                        'prodi' => $request->f1_kodeprodi,
                        'tahun_lulus' => $request->f1_tahunlulus,
                        'no_hp' => $request->f1_nomorhp,
                        'email' => $request->f1_email,
                    ]);

        return redirect()->action([F1Controller::class, 'index']);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);

		// import data
		Excel::import(new F1Import, public_path('/file_siswa/'.$nama_file));

		// notifikasi dengan session
		// alihkan halaman kembali
		return back();
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
        $where = array('id' => $id);
        $post  = F1::where($where)->first();

        return response()->json($post);
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
        $post = F1::where('id',$id)->delete();

        return response()->json($post);
    }

    public function export_excel()
	{
		return Excel::download(new F1Export, 'F1.xlsx');
	}
}
