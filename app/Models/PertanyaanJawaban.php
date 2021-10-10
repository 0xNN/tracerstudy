<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanJawaban extends Model
{
    use HasFactory;

    protected $fillable = ['pertanyaan_id','sub_pertanyaan_id','jawaban_id'];
    protected $table = 'pertanyaan_jawabans';

    public function sub_pertanyaan()
    {
        return $this->belongsTo(SubPertanyaan::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
