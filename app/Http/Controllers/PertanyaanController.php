<?php

namespace App\Http\Controllers;
use App\Models\Pertanyaan;
use App\Models\SubPertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pertanyaan = Pertanyaan::all();
        if ($request->ajax()){
            return datatables()->of($pertanyaan)->addColumn('action', function($data){
                            $button = '<div class="btn-group btn-group-sm" role="group">';
                            $button .= '<button href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></button>';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';
                            // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-dark btn-sm detail-post"><i class="far fa-eye"></i></button>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->editColumn('kode_pertanyaan', function($data) {
                            return '<div class="badge badge-danger">'.$data->kode_pertanyaan.'</div>';
                        })
                        ->rawColumns(['action','kode_pertanyaan'])
                        ->addIndexColumn()
                        ->make(true);
                    }
        $nama = Pertanyaan::get();
        return view('pertanyaan',['nama'=>$nama] );
    }

    public function getData()
    {
        $nama = Pertanyaan::all();
        dd($nama);
        // return view('pertanyaan',['nama'=>$nama]);
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

        $post   =   Pertanyaan::updateOrCreate(['id' => $id],
                    [
                        'kode_pertanyaan' => $request->kode_pertanyaan,
                        'deskripsi_pertanyaan' => $request->deskripsi_pertanyaan,
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
        $where = array('id' => $id);
        $post  = Pertanyaan::where($where)->first();
        
        return response()->json($post);
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
        $post  = Pertanyaan::where($where)->first();

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
        // return response()->json($request->text);
        if($request->ajax())
        {
            if($request->text === "enabled")
            {
                // return response()->json($request->id);

                $pertanyaan = Pertanyaan::find($id);
                $pertanyaan->status = "disabled";
                $pertanyaan->save();

                return response()->json(['success' => 'Berhasil', 'pertanyaan' => $pertanyaan]);
            }
            else {
                $pertanyaan = Pertanyaan::find($id);
                $pertanyaan->status = "enabled";
                $pertanyaan->save();

                return response()->json(['success' => 'Berhasil', 'pertanyaan' => $pertanyaan]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pertanyaan::where('id',$id)->delete();

        return response()->json($post);
    }

    public function getPertanyaan(Request $request)
    {
        if(preg_match("/value/i", $request['request'])) {
            $data = str_replace('{','',strstr($request['request'], '"value":"'));
            $data = str_replace('}','',$data);
            $data = str_replace(':',',',$data);
            $data = explode(',',$data);
            $data = str_replace('"','',$data);
            // dd($data);
            $pertanyaan = Pertanyaan::where('kode_pertanyaan','like',"%$data[1]%")
                                    ->orWhere('deskripsi_pertanyaan','like',"%$data[1]%")
                                    ->get();
            
            return response()->json([
                "total" => $pertanyaan->count(),
                "records" => $pertanyaan,
            ], 200);
        }
        else {
            $pertanyaan = Pertanyaan::all();
    
            return response()->json([
                "total" => $pertanyaan->count(),
                "records" => $pertanyaan,
            ], 200);
        }

    }

}
