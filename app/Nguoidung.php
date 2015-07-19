<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    protected $table = 'nguoidung';

    protected $fillable = [
    	'email',
    	'pass'
    ];
}
