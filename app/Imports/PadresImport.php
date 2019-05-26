<?php

namespace App\Imports;

use App\Padres;
use Maatwebsite\Excel\Concerns\ToModel;
class PadresImport implements ToModel
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
       
        return new Padres([
            'cedula'                    => $row[0],
            'nombres'                   => $row[1],
            'cedula_conyugue'           => $row[2],  
            'nombre_conyugue'           => $row[3], 
            'cedula_padre'              => $row[4], 
            'nombre_padre'              => $row[5],
            'cedula_madre'              => $row[6],
            'nombre_madre'              => $row[7],
          
        ]);
    }
}
