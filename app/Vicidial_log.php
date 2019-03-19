<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vicidial_log extends Model
{
    protected $connection = 'asterisk';
    protected $table = 'vicidial_log';
    protected $primaryKey = 'uniqueid';

    public function cabecera()
    {
        return $this->belongsTo('App\Vicidial_list','lead_id');
    }

    public function audio()
    {
        return $this->belongsTo('App\Recording_log','recording_id','vicidial_id');
    }

}
