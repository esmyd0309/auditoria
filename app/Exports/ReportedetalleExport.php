<?php

namespace App\Exports;

use App\Reportedetalle;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportedetalleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reportedetalle::all();
    }
}
