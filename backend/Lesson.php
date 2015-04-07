<?php
//Class lesson
class Lesson {
    var $id;
    var $subID;
    var $maLMH;
    var $nhom;
    var $viTri;
    var $soTiet;
    var $giaoVien;
    var $giangDuong;

    function __construct($id, $subID, $ma, $nhom, $vitri, $sotiet, $giaovien, $giangduong ) {
        $this->id = $id;
        $this->subID = $subID;
        $this->maLMH = $ma;
        $this->nhom = $nhom;
        $this->viTri = $vitri;
        $this->soTiet = $sotiet;
        $this->giaoVien = $giaovien;
        $this->giangDuong = $giangduong;
    }
}
?>