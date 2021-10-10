<?php

namespace App\Exports;

use App\Models\JawabanUser;
use App\Models\F1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JawabanUserExport implements FromView
{
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('view_export', [
            'F1' => F1::all(),
            'kode' => JawabanUser::all()
        ]);
    }
}
