<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipePertanyaan;
use App\Models\Pertanyaan;
class TipePertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipepertanyaan = TipePertanyaan::all();
        if ($request->ajax()){
            return datatables()->of($tipepertanyaan)->addColumn('action', function($data){
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

        $post = TipePertanyaan::updateOrCreate(['id' => $id],
        [
            'desk_tipe_soal' => $request->desk_tipe_soal,
            'id_pertanyaan' => $request->id_pertanyaan
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
        $where = array ('id' => $id);
        $post = TipePertanyaan::where($where)->first();

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TipePertanyaan::where('id',$id)->delete();

        return response()->json($post);
    }
}
