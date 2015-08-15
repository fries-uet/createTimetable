<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'input';


    protected $fillable = [
        'maMH',
        'monhoc',
        'soTin',
        'maLMH',
        'giangVien',
        'soSV',
        'thu',
        'tiet',
        'giangDuong',
        'ghiChu'
    ];

}
