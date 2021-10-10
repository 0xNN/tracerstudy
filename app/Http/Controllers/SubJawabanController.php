<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubJawaban;

class SubJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjawaban = SubJawaban::all();
        if ($request->ajax()){
            return datatables()->of($subjawaban)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-sub"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="deletesub btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        return view('jawaban');
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

        $post = SubJawaban::updateOrCreate(['id' =>$id],
        [
            'deskripsi__jawaban' => $request->deskripsi__jawaban,
            'id_jawaban'=> $request->id_jawaban,
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
        $where = array('id' => $id);
        $post = SubJawaban::where($where) ->first();

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
        $post = SubJawaban::where('id',$id)->delete();

        return response()->json($post);
    }
}
