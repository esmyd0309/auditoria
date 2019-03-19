<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recording_log extends Model
{
    protected $connection = 'asterisk';
    protected $table = 'recording_log';
    protected $primaryKey = 'recording_id';

    


    public function logs()
    {
        return $this->hasMany('App\Vicidial_log','uniqueid');
    }

}
