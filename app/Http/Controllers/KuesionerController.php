<?php

namespace App\Http\Controllers;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\TipePertanyaan;
use App\Models\SubJawaban;
use App\Models\F1;
use App\Models\JawabanStatus;
use App\Models\KuesionerMaster;
use App\Models\Master;
use App\Models\PertanyaanJawaban;
use App\Models\PertanyaanTipe;
use App\Models\SubPertanyaan;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //dd(auth()->user()->id);
        $jawaban_status = JawabanStatus::where('user_id', auth()->user()->id)->first();
        $user = F1::where('user_id', auth()->user()->id)->first();
        //dd($jawaban_status);
        $kuisioner_status = KuesionerMaster::whereStatus('enabled')->first();
        $datta = Pertanyaan::where('kuesioner_master_id', $kuisioner_status->id)->get();

        $all_1 = array();
        foreach($datta as $pertanyaan)
        {
            $pertanyaan_jawabans = PertanyaanJawaban::where('pertanyaan_id', $pertanyaan->id)->groupBy('pertanyaan_id')->get();
            foreach($pertanyaan_jawabans as $pj)
            {
                if($pj->sub_pertanyaan_id > 0)
                {
                    $pertanyaan['is_sub_pertanyaan'] = true;
                    array_push($all_1,$pertanyaan);
                }
                else {
                    $pertanyaan['is_sub_pertanyaan'] = false;
                    array_push($all_1,$pertanyaan);
                }
            }
        }

        $all_2 = array();
        foreach($all_1 as $a1)
        {
            if($a1['is_sub_pertanyaan'] == true)
            {
                $get_sub_pertanyaan = SubPertanyaan::where('pertanyaan_id', $a1['id'])->get();
                $a1['sub_pertanyaan'] = $get_sub_pertanyaan;
                array_push($all_2, $a1);
            }
            else {
                $a1['sub_pertanyaan'] = [];
                array_push($all_2, $a1);
            }

            $pertanyaan_jawabans = PertanyaanJawaban::join('jawabans','jawabans.id','pertanyaan_jawabans.jawaban_id')->wherePertanyaanId($a1['id'])->get();
            $a1['jawaban'] = $pertanyaan_jawabans;

            $tipe = PertanyaanTipe::wherePertanyaanId($a1['id'])->first();
            $a1['tipe'] = $tipe->tipe->nama_tipe;
        }

        // return response()->json($all_2);
        return view('kuisioner', compact('all_2','jawaban_status','user','kuisioner_status'));
        //dd($data);

        // return view('Kuesioner', compact('datas','data','datta', 'dataa','subj','pertanyaan_tipes'));
        // return view('kuisioner', compact('datas','data','datta', 'dataa','subj','pertanyaan_tipes','subp','pertanyaan_jawabans'));
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
        //
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
        //
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
        //
    }

    public function getData($id)
    {
        $jawaban = Jawaban::find($id);

        return response()->json($jawaban);
    }

    public function print($nim)
    {
        return view('print');
    }
}
