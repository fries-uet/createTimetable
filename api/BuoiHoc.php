<?php

class BuoiHoc {
    var $id;
    var $nhom;
    var $viTri;
    var $soTiet;
    var $giaoVien;
    var $giangDuong;

    function __construct($id, $nhom, $vitri, $sotiet, $giaovien, $giangduong ) {
        $this->id = $id;
        $this->nhom = $nhom;
        $this->viTri = $vitri;
        $this->soTiet = $sotiet;
        $this->giaoVien = $giaovien;
        $this->giangDuong = $giangduong;
    }
}
?>