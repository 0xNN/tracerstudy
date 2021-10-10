<?php

namespace App\Http\Controllers;

use App\Exports\JawabanUserExport;
use App\Models\KuesionerMaster;
use App\Models\KuesionerMasterPertanyaan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

class KuesionerMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kuesioner_masters = KuesionerMaster::all();
        if ($request->ajax()){
            return datatables()->of($kuesioner_masters)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<button href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></button>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-dark btn-sm detail-post"><i class="far fa-eye"></i></button>';
                            // $button .= '<button href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="EditPertanyaan" class="edit-pertanyaan btn btn-success btn-sm edit-pertanyaan-post"><i class="fas fa-plus"></i> Pertanyaan</button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('status', function($data) {
                            if($data->status === 'enabled')
                            {
                                return '<a class="edit-status" id="edit-status" href="javascript:void(0)" data-toogle="tooltip" data-placement="top" data-id="'.$data->id.'" title="klik untuk disable"><span class="badge badge-success">'.$data->status.'</span></a>';
                            }
                            else {
                                return '<a class="edit-status" id="edit-status" href="javascript:void(0)" data-toogle="tooltip" data-placement="top" data-id="'.$data->id.'" title="klik untuk enable"><span class="badge badge-danger">'.$data->status.'</span></a>';
                            }
                        })
                        ->rawColumns(['action','status'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $nama = KuesionerMaster::get();
        $pertanyaans = Pertanyaan::all();

        // dd(empty($pertanyaans[5]->kuesioner_master_pertanyaan));
        return view('kuesioner_master',['nama'=>$nama,'pertanyaans'=>$pertanyaans]);
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
        $id = $request->id;

        $post   =   KuesionerMaster::updateOrCreate(['id' => $id],
                    [
                        'nama_kuesioner' => $request->nama_kuesioner,
                        'status' => 'disabled'
                    ]);

        // $pertanyaans = Pertanyaan::all();

        // foreach($pertanyaans as $pertanyaan)
        // {
        //     KuesionerMasterPertanyaan::create([
        //         'kuesioner_master_id' => $post->id,
        //         'pertanyaan_id' => $pertanyaan->id,
        //         'status' => 'unchecked'
        //     ]);
        // }
        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KuesionerMaster  $kuesionerMaster
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where = array('id' => $id);
        $post  = KuesionerMaster::where($where)->first();
        dd($post);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KuesionerMaster  $kuesionerMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = KuesionerMaster::where($where)->first();

        return response()->json($post);
    }

    public function editPertanyaan($id)
    {
        $where = array('kuesioner_master_id' => $id);

        $pertanyaans = Pertanyaan::all();

        $datas = array();
        foreach($pertanyaans as $pertanyaan)
        {
            $get = KuesionerMasterPertanyaan::where($where)
                                            ->where('pertanyaan_id', $pertanyaan->id)->first();

            if($get === null){
                $data['status'] = 'unchecked';
            }
            else {

            }

            array_push($datas, $data);
        }

        return response()->json($get);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KuesionerMaster  $kuesionerMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax())
        {
            if($request->text === "enabled")
            {
                $kuesioner_master = KuesionerMaster::find($id);
                $kuesioner_master->status = "disabled";
                $kuesioner_master->save();

                return response()->json(['success' => 'Berhasil', 'kuesioner_master' => $kuesioner_master]);
            }
            else {
                KuesionerMaster::where('status', 'enabled')->update(['status' => 'disabled']);
                $kuesioner_master = KuesionerMaster::find($id);
                $kuesioner_master->status = "enabled";
                $kuesioner_master->save();

                return response()->json(['success' => 'Berhasil', 'kuesioner_master' => $kuesioner_master]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KuesionerMaster  $kuesionerMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(KuesionerMaster $kuesionerMaster)
    {
        //
    }

    public function simpanPertanyaan(Request $request)
    {
        $id_master_pertanyaan = $request->id_pertanyaan_master;
        foreach($request->pertanyaan_id as $pertanyaan_id)
        {
            $kuesioner_master_pertanyaan = new KuesionerMasterPertanyaan;
            $kuesioner_master_pertanyaan->kuesioner_master_id = $id_master_pertanyaan;
            $kuesioner_master_pertanyaan->pertanyaan_id = $pertanyaan_id;
            $kuesioner_master_pertanyaan->save();
        }

        return response()->json($kuesioner_master_pertanyaan);
    }

    public function export()
    {
        return Excel::download(new JawabanUserExport, date('Ymd').'_E-Tracer.xlsx');
    }
}
