<?php

namespace App\Http\Controllers;

use App\Models\PertanyaanJawaban;
use Illuminate\Http\Request;

class F1JawabanController extends Controller
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
        $data = collect($request->except('_token'))->keys();

        $arrayData = array();

        $temp = array();

        $z = 1;
        foreach($data as $key)
        {
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
                // // dd($ex);
                $arrayData[$ex] = $req[$key];
                // $arrayData[$exp[4]] = $req[$key];
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

        $f9s = isset($req["checkboxpertanyaan_id_3_f4_3"]) ? $req["checkboxpertanyaan_id_3_f4_3"] : '';
        
        $i = 1;
        while($i <= 15) {

            if(isset($f4s[$i])) {

                if($i > 9) {
                    $arrayData["f4".$i] = "1";
                }
                else {
                    $arrayData["f40".$i] = "1";
                }

            }
            else {

                if($i > 9) {
                    $arrayData["f4".$i] = "";
                }
                else {
                    $arrayData["f40".$i] = "";
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
            }
            else {
                $arrayData["f90".$j] = "";
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
                }
                else {
                    $arrayData["f160".$j] = "1";
                }

            }
            else {

                if($j > 9) {
                    $arrayData["f16".$j] = "";
                }
                else {
                    $arrayData["f160".$j] = "";
                }

            }
            $i = $i + 1;
            $j = $j + 1;
        }

        dd($arrayData);
        dd($request->all());
        foreach($request->except('_token') as $key => $value)
        {
            dd(explode('_',$key));
        }
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
}
