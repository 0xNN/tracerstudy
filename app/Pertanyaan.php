<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $guarded = [];
    protected $table = 'pertanyaans';

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function sub_pertanyaan()
    {
        return $this->hasMany(SubPertanyaan::class);
    }
}
