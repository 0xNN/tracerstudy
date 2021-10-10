<?php

namespace App\Http\Controllers;

use App\Models\SubPertanyaan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class SubPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subpertanyaan = SubPertanyaan::all();
        if ($request->ajax()){
            return datatables()->of($subpertanyaan)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-sub"><i class="far fa-edit"></i></a>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="deletesub btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('pertanyaan_id', function($data) {
                            return $data->pertanyaan->kode_pertanyaan;
                        })
                        ->rawColumns(['action','pertanyaan_id'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        return view('pertanyaan');
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

        $post   =   SubPertanyaan::updateOrCreate(['id' => $id],
                    [
                        'deskripsi__pertanyaan' => $request->deskripsi__pertanyaan,
                        'id_pertanyaan' => $request->id_pertanyaan,
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
        $post  = SubPertanyaan::where($where)->first();

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
        $post = SubPertanyaan::where('id',$id)->delete();

        return response()->json($post);
    }
}
