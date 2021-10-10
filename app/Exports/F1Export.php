<?php

namespace App\Exports;

use App\Models\F1;
use Maatwebsite\Excel\Concerns\FromCollection;

class F1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return F1::all();
    }
}
