<?php
//Class subject
class MonHoc {
    var $id;
    var $maMH;
    var $tenMH;
    var $soTin;
    var $lopMHs;//Danh sach cac LMH

    function __construct($id, $ma, $ten, $tin, $lopMHs) {
        $this->id = $id;
        $this->maMH = $ma;
        $this->tenMH = $ten;
        $this->soTin = $tin;
        $this->lopMHs = $lopMHs;
    }
}
?>