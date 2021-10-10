<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\PertanyaanJawaban;
use App\Models\SubPertanyaan;
use Illuminate\Http\Request;

class PertanyaanJawabanController extends Controller
{
    public function index(Request $request) 
    {
        $pj = PertanyaanJawaban::all();
        if ($request->ajax()){
            return datatables()->of($pj)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<button href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></button>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-dark btn-sm detail-post"><i class="far fa-eye"></i></button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('sub_pertanyaan_id', function($data) {
                            if(empty($data->sub_pertanyaan)) {
                                return '';
                            }
                            else {
                                return $data->sub_pertanyaan->deskripsi_sub_pertanyaan;
                            }
                        })
                        ->editColumn('jawaban_id', function($data) {
                            return $data->jawaban->deskripsi_jawaban;
                        })
                        ->editColumn('pertanyaan_id', function($data) {
                            return $data->pertanyaan->kode_pertanyaan;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $pertanyaan= Pertanyaan::all();
        $jawaban = Jawaban::all();
        $sub_pertanyaan = SubPertanyaan::all();
        return view('pertanyaan_jawaban',['pertanyaans'=>$pertanyaan,'jawabans'=>$jawaban, 'sub_pertanyaans'=>$sub_pertanyaan]);
    }

    public function store(Request $request)
    {
        $id = $request->id;

        $post   =   PertanyaanJawaban::updateOrCreate(['id' => $id],
                    [
                        'pertanyaan_id' => $request->pertanyaan_id,
                        'sub_pertanyaan_id' => $request->sub_pertanyaan_id,
                        'jawaban_id' => $request->jawaban_id
                    ]);

        return response()->json($post);
    }
}
