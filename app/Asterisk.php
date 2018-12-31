<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asterisk extends Model
{
    protected $table = 'gestiones';
    protected $primaryKey = 'id';

    protected $connection = 'asterisk';
}
