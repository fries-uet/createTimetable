<?php
//Class lesson
class lesson {
    var $monHoc;
    var $maLMH;
    var $nhom;
    var $viTri;
    var $soTiet;
    var $giaoVien;
    var $giangDuong;

    function __construct($mon, $ma, $nhom, $vitri, $tiet, $giaovien, $giangduong) {
        $this->monHoc = $mon;
        $this->maLMH = $ma;
        $this->nhom = $nhom;
        $this->viTri = $vitri;
        $this->soTiet = $tiet;
        $this->giaoVien = $giaovien;
        $this->giangDuong = $giangduong;
    }
}
?>