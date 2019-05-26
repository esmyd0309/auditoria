<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    protected $table = 'padres';

    
    protected $fillable = ['cedula', 'nombres','cedula_conyugue','nombre_conyugue','cedula_padre' ,'nombre_padre','cedula_madre','nombre_madre',];
   

  
}
