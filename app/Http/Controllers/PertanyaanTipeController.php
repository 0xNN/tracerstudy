<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\PertanyaanTipe;
use App\Models\Tipe;
use Illuminate\Http\Request;

class PertanyaanTipeController extends Controller
{
    public function index(Request $request)
    {
        $pertanyaan_tipes = PertanyaanTipe::all();
        $tipes = Tipe::all();

        if ($request->ajax()){
            return datatables()->of($pertanyaan_tipes)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('pertanyaan_id', function($data) {
                            return $data->pertanyaan->deskripsi_pertanyaan;
                        })
                        ->editColumn('tipe_id', function($data) {
                            return $data->tipe->nama_tipe;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $pertanyaans = Pertanyaan::all();

        return view('tipepertanyaan',compact('tipes','pertanyaans'));
    }

    public function store(Request $request)
    {
        $id = $request->id;

        $post = PertanyaanTipe::updateOrCreate(['id' => $id],
        [
            'pertanyaan_id' => $request->pertanyaan_id,
            'tipe_id' => $request->tipe_id,
        ]);

        return response()->json($post);
    }

    public function edit($id)
    {
        $where = array ('id' => $id);
        $get = PertanyaanTipe::where($where)->first();

        return response()->json($get);
    }

    public function destroy($id)
    {
        $post = PertanyaanTipe::where('id',$id)->delete();

        return response()->json($post);
    }
}
