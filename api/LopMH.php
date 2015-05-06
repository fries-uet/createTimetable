<?php

class LopMH {
    var $id;
    var $maLMH;
    var $buoiHocs;//Danh sach cac buoi hoc

    function __construct($id, $maLMH, $buoiHocs) {
        $this->id = $id;
        $this->maLMH = $maLMH;
        $this->buoiHocs = $buoiHocs;
    }
}