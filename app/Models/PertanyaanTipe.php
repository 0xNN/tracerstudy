<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanTipe extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'pertanyaan_tipes';

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
