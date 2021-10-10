<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $guarded = [];
    protected $table = 'pertanyaans';

    public function pertanyaan_tipe()
    {
        return $this->hasOne(PertanyaanTipe::class);
    }

    public function kuesioner_master_pertanyaan()
    {
        return $this->hasMany(KuesionerMasterPertanyaan::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function sub_pertanyaan()
    {
        return $this->hasMany(SubPertanyaan::class);
    }

    public function pertanyaan_jawaban()
    {
        return $this->hasMany(PertanyaanJawaban::class);
    }
}
