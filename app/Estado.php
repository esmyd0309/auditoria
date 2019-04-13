<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $connection = 'asterisk';
    protected $table = 'vicidial_campaign_statuses';

    
    public function tarea()
    {
        return $this->belongsTo('App\Tarea', 'tareas_id');
    }
}
