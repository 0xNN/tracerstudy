<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanStatus;
use App\Models\JawabanUser;
use App\Models\JawabanUserDetail;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JawabanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $req = $request->toArray();
        // dd($req);
        $data = collect($request->except('_token'))->keys();

        $arrayData = array();
        $arrayKey = array();

        $temp = array();

        $z = 1;
        foreach($data as $key)
        {
            array_push($arrayKey, $key);
            $exp = explode("_",$key);
            if($exp[1] === "sub")
            {
                $tmp = $exp[4];
                $arrayData[$exp[2]] = $tmp;
            }
            else if($exp[0] == "inputpertanyaan") {
                if($exp[5] == "0") {
                    $arrayData[$exp[3]] = $req[$key];
                }
                else {
                    if($exp[3] == 'f13') {
                        $arrayData[$exp[3]."0".$z] = $req[$key];
                        $z = $z + 1;
                    }
                    else {
                        $plus = (int) $exp[5]+1;
                        $kode = (string) $exp[3]."0".$plus;
        
                        if($req[$key] === null) {
                            if($exp[3] == 'f3') {
                                $arrayData[$kode] = "";
                                $temp[$kode] = "Null";
                            }
                        }
                        else {
                            $arrayData[$kode] = $req[$key];
                            $temp[$kode] = "Not Null";
                        }
                    }
                }
            }
            else if(isset($exp[7]) && $key !== null) {
                $val1 = explode("-", $exp[7])[0];
                $val2 = (int) explode("-", $exp[7])[1];
                $val2 = $val2 + 1;
                $ex = ($val2 < 10) ? join("", [$val1, "0", $val2]) : join("", [$val1, $val2]);
                $arrayData[$ex] = $req[$key];
            }
            else if(isset($exp[6]) && $exp[6] === 'lainnya') {
                $arrayData[$exp[3]."02"] = $req[$key];
            }
            else if(($exp[0] == 'radiopertanyaan' && $exp[3] == 'f10') || ($exp[0] == 'radiopertanyaan' && $exp[3] == 'f11')) {
                $arrayData[$exp[3]."01"] = $req[$key];
            }
            else if(($exp[0] == 'radiopertanyaan' && $exp[3] == 'f14') || ($exp[0] == 'radiopertanyaan' && $exp[3] == 'f15') || ($exp[3]=='f8')) {
                $arrayData[$exp[3]] = $req[$key];
            }
            else if($exp[0] == 'rangepertanyaan') {
                $ex = explode("-",$exp[4]);
                if($ex[1] < 10)
                {
                    $idx = "0".$ex[1];
                }
                else {
                    $idx = $ex[1];
                }
                $ex = join("",[$ex[0], $idx]);
                $arrayData[$ex] = $req[$key];
            }
        }

        // dd($temp);
        if($temp["f302"] == "Null" && $temp["f303"] == "Null")
        {
            $arrayData["f301"] = "3";
        }
        else if($temp["f302"] == "Not Null") {
            $arrayData["f301"] = "1";
        }
        else if($temp["f303"] == "Not Null") {
            $arrayData["f301"] = "2";
        }

        if(isset($temp["f502"]) && $temp["f502"] == "Not Null")
        {
            $arrayData["f501"] = "1";
            $arrayData["f503"] = "";
        }
        else if(isset($temp["f503"]) && $temp["f503"] == "Not Null") {
            $arrayData["f501"] = "2";
            $arrayData["f502"] = "";
        }

        $f4s = isset($req["checkboxpertanyaan_id_3_f4_3"]) ? $req["checkboxpertanyaan_id_3_f4_3"] : '';
        
        $i = 1;
        while($i <= 15) {

            if(isset($f4s[$i])) {

                if($i > 9) {
                    $arrayData["f4".$i] = "1";
                    array_push($arrayKey, 'checkboxpertanyaan_id_3_f4_3');
                }
                else {
                    $arrayData["f40".$i] = "1";
                    array_push($arrayKey, 'checkboxpertanyaan_id_3_f4_3');
                }

            }
            else {

                if($i > 9) {
                    $arrayData["f4".$i] = "";
                    array_push($arrayKey, 'checkboxpertanyaan_id_3_f4_3');
                }
                else {
                    $arrayData["f40".$i] = "";
                    array_push($arrayKey, 'checkboxpertanyaan_id_3_f4_3');
                }

            }
            $i = $i + 1;
        }

        $f9s = isset($req["checkboxpertanyaan_id_9_f9_9"]) ? $req["checkboxpertanyaan_id_9_f9_9"] : '';
        
        $i = 26;
        $j = 1;
        while($i <= 30) {

            if(isset($f9s[$i])) {
                $arrayData["f90".$j] = "1";
                array_push($arrayKey, 'checkboxpertanyaan_id_9_f9_9');
            }
            else {
                $arrayData["f90".$j] = "";
                array_push($arrayKey, 'checkboxpertanyaan_id_9_f9_9');
            }
            $i = $i + 1;
            $j = $j + 1;
        }

        $f16s = isset($req["checkboxpertanyaan_id_15_f16_15"]) ? $req["checkboxpertanyaan_id_15_f16_15"] : '';
        
        $i = 61;
        $j = 1;
        while($i <= 73) {

            if(isset($f16s[$i])) {

                if($j > 9) {
                    $arrayData["f16".$j] = "1";
                    array_push($arrayKey, 'checkboxpertanyaan_id_15_f16_15');
                }
                else {
                    $arrayData["f160".$j] = "1";
                    array_push($arrayKey, 'checkboxpertanyaan_id_15_f16_15');

                }

            }
            else {

                if($j > 9) {
                    $arrayData["f16".$j] = "";
                    array_push($arrayKey, 'checkboxpertanyaan_id_15_f16_15');

                }
                else {
                    $arrayData["f160".$j] = "";
                    array_push($arrayKey, 'checkboxpertanyaan_id_15_f16_15');

                }

            }
            $i = $i + 1;
            $j = $j + 1;
        }

        // ksort($arrayData);
        // dd($arrayKey);
        // Proses menyimpan ke database

        $jawaban_status = JawabanStatus::firstOrCreate(['user_id' => auth()->user()->id],[
            'is_finish' => 1,
            'user_id' => auth()->user()->id,
            'user_modify' => auth()->user()->name,
        ]);

        foreach($arrayData as $key => $value)
        {
            // dd($request->ip());
            $jawaban_user = new JawabanUser;
            $jawaban_user->kode = $key;
            $jawaban_user->isi = $value;
            $jawaban_user->user_id = auth()->user()->id;
            $jawaban_user->jawaban_status_id = $jawaban_status->id;
            $jawaban_user->ip_address = $request->ip();
            $jawaban_user->tahun = date('Y');
            $jawaban_user->status = 'selesai';
            $jawaban_user->save();
        }

        // dd($request->all());

        return back()->with('success', 'Berhasil Mengisi Kuesioner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function show(JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function edit(JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JawabanUser $jawabanUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JawabanUser  $jawabanUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(JawabanUser $jawabanUser)
    {
        //
    }
}
