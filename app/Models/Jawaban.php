<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $guarded = [];
    protected $table = 'jawabans';

    public function sub_jawaban()
    {
        return $this->hasOne(SubJawaban::class,'id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function pertanyaan_jawaban()
    {
        return $this->hasMany(PertanyaanJawaban::class);
    }
}
