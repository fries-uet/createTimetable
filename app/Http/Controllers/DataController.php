<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use App\Monhoc;
use App\Lopmh;
use App\Buoihoc;
use Response;

class DataController extends Controller
{
    public function index() {
        try {
            $statusCode = 200;
            $response = [];
     
            $monhoc = Monhoc::all();
            $lopmh = Lopmh::all();
            $buoihoc = Buoihoc::all();

            foreach($monhoc as $m){
                $idMH = $m->id;//ID của môn học

                $lopMH = DB::table('lopmh')
                    ->where('sub_id', $idMH)
                    ->get();

                //Truy vấn đên từng lớp môn học dựa trên id của môn học
                $listLMH = [];
                foreach ($lopMH as $mh) {
                    $idLMH = $mh->id;//ID của Lớp môn học
                    $dsBuoi = json_decode($mh->danhSach);

                    //Truy vấn đến từng buổi học dựa trên danh sách của buổi học
                    $buoiHocs = [];
                    foreach ($dsBuoi as $i) {
                        $b = DB::table('buoihoc')
                            ->where('id', $i)
                            ->first();

                        $buoiHocs[] = [
                            'id'        => $b->id,
                            'nhom'      => $b->nhom,
                            'viTri'     => $b->viTri,
                            'soTiet'    => $b->soTiet,
                            'giaoVien'  => $b->giaoVien,
                            'giangDuong'=> $b->giangDuong
                        ];
                    }

                    $listLMH[] = [
                        'id'        => $mh->id,
                        'maLMH'     => $mh->maLMH,
                        'buoiHocs'  => $buoiHocs
                    ];
                }

                $response[] = [
                    'id'     => $m->id,
                    'maMH'   => $m->maMH,
                    'tenMH'  => $m->tenMH,
                    'soTin'  => $m->soTin,
                    'lopMHs' => $listLMH
                ];
            }
        } catch (Exception $e){
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }
}
