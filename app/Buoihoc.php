<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buoihoc extends Model
{
    protected $table = 'buoihoc';

    protected $fillable = [
        'nhom',
        'viTri',
        'soTiet',
        'giangDuong',
        'giaoVien'
    ];
}
