<?php
//Class lesson
class Lesson {
    var $maLMH;
    var $nhom;
    var $viTri;
    var $soTiet;
    var $giaoVien;
    var $giangDuong;

    function __construct( $ma, $nhom, $vitri, $sotiet, $giaovien, $giangduong ) {
        $this->maLMH = $ma;
        $this->nhom = $nhom;
        $this->viTri = $vitri;
        $this->soTiet = $sotiet;
        $this->giaoVien = $giaovien;
        $this->giangDuong = $giangduong;
    }
}
?>