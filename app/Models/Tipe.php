<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tipes';

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function pertanyaan_tipe()
    {
        return $this->hasMany(PertanyaanTipe::class);
    }
}
