<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asterisk extends Model
{
    protected $table = 'vicidial_users';
    protected $primaryKey = 'user_id';

    protected $connection = 'asterisk';
}
