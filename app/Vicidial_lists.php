<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vicidial_lists extends Model
{
    protected $connection = 'asterisk';
    protected $table = 'vicidial_lists';
    protected $primaryKey = 'list_id';
}
