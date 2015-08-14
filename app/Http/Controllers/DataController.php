<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use Response;
use App\Monhoc;

class DataController extends Controller
{
    public function index() {
        try {
            $statusCode = 200;
            $response = [];
     
            $monhoc = Monhoc::all();

            $arrMH = [];//Danh sách môn học ở dạng mảng đối tượng
            foreach ($monhoc as $mh) {
                $lopMHs = json_decode($mh->lopMHs);//Decode to array

                $arrLMH = [];//Danh sách lớp môn học ở dạng mảng các đối tượng
                foreach ($lopMHs as $id_lmh) {
                    $lopMH = DB::table('lopmh')
                        ->where('id', $id_lmh)
                        ->first();

                    $buoihocs = json_decode($lopMH->buoihocs);//Decode to array (Danh sách buổi học)

                    $arrBuoiHoc = [];//Danh sách buổi học ở dạng mảng các đối tượng
                    foreach ($buoihocs as $id_bh) {
                        $buoihoc = DB::table('buoihoc')
                            ->where('id', $id_bh)
                            ->first();

                        array_push($arrBuoiHoc, $buoihoc);
                    }

                    $lopMH->buoihocs = $arrBuoiHoc;
                    array_push($arrLMH, $lopMH);
                }

                $mh->lopMHs = $arrLMH;
                array_push($arrMH, $mh);
            }

            $response = $arrMH;
        } catch (Exception $e){
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }
}
