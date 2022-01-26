<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jawaban = Jawaban::all();
        if ($request->ajax()){
            return datatables()->of($jawaban)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('kode_jawaban', function($data) {
                            return '<div class="badge badge-danger">'.$data->kode_jawaban.'</div>';
                        })
                        ->rawColumns(['action','kode_jawaban'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $jawabans = Jawaban::all();
        $pertanyaans = Pertanyaan::all();
        return view('jawaban', compact('jawabans','pertanyaans'));
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
        // return response()->json($request->all());
        $id = $request->id;

        $post   =   Jawaban::updateOrCreate(['id' => $id],
                    [
                        'deskripsi_jawaban' => $request->deskripsi_jawaban,
                        // '' => $request->pertanyaan_id,
                        'kode_jawaban' => $request->kode_jawaban
                    ]);

        return response()->json($post);
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
        $where = array('id' =>$id);
        $post = Jawaban::where($where)->first();

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
        $post = Jawaban::where('id',$id)->delete();

        return response()->json($post);
    }
}
