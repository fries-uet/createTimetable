<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lopmh extends Model
{
    protected $table = 'lopmh';

    protected $fillable = [
        'buoihocs',
        'maLMH'
    ];
}
