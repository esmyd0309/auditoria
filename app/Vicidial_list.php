<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vicidial_list extends Model
{
    protected $connection = 'asterisk';
    protected $table = 'vicidial_list';
    protected $primaryKey = 'lead_id';

    public function gestion()
    {
        return $this->hasMany('App\Vicidial_log','lead_id');
    }
}
