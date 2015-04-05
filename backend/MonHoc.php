<?php
class MonHoc{
    public $tenMH;
    public $maLMH;
    public $giaoVien;
    public $giangDuong;
    public $soTin;
    public $nhom;
    public $thu;
    public $start;
    public $end;
    public function __construct( $tenMH, $maLMH, $giaoVien, $giangDuong, $soTin, $nhom, $thu, $start, $end ){
        $this->tenMH = $tenMH;
        $this->maLMH = $maLMH;
        $this->giaoVien = $giaoVien;
        $this->giangDuong = $giangDuong;
        $this->soTin = $soTin;
        $this->nhom = $nhom;
        $this->thu = $thu;
        $this->start = $start;
        $this->end = $end;
    }
}
?>