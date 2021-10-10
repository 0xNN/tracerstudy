<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $guarded = [];
    protected $table = 'jawabans';

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
