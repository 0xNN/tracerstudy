<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubPertanyaan extends Model
{
    protected $guarded = [];
    protected $table = 'sub_pertanyaans';

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function pertanyaan_jawabab()
    {
        return $this->hasMany(PertanyaanJawaban::class);
    }
}
