<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubJawaban extends Model
{
    protected $guarded = [];
    protected $table = 'sub_jawaban';

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
