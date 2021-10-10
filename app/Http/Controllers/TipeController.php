<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index(Request $request)
    {
        $tipes = Tipe::all();
        if ($request->ajax()){
            return datatables()->of($tipes)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $nama = Pertanyaan::get();
        return view('tipepertanyaan',['nama'=>$nama]);
    }

    public function store(Request $request)
    {
        $id = $request->id;

        $post = Tipe::updateOrCreate(['id' => $id],
        [
            'nama_tipe' => $request->desk_tipe_soal,
            'id_pertanyaan' => $request->id_pertanyaan
        ]);

        return response()->json($post);
    }
}
