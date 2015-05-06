<?php
/*
 * @Class BuoiHoc
 * - id: ID của buổi học
 * - nhom: nhóm của buổi học
 * - viTri: viTri của buổi học trên lịch tuần
 * - soTiet: số tiết của buổi học
 * - giaoVien: Giảng viên dạy ở buổi học
 * - giangDuong: Địa điểm của buổi h
 */

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