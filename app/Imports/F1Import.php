<?php

namespace App\Imports;

use App\Models\F1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class F1Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new F1([
         'nim_mahasiswa'  => $row['nim'],
         'nama_mahasiswa' => $row['nama'],
         'jenis_kelamin'  => $row['jenis_kelamin'],
         'fakultas'       => $row['fakultas'],
         'prodi'          => $row['prodi'],
         'tahun_lulus'    => $row['tahun_lulus'],
         'no_hp'          => $row['no_hp'],
         'kode_pt'        => (empty($row['kode_pt'])) ? '': $row['kode_pt'],
         'email'          => $row['email']
        ]);
    }
}
