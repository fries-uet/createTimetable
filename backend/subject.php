<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//Class subject
class subject {
    var $id;
    var $maMH;
    var $tenMH;
    var $soTin;

    function __construct($id, $ma, $ten, $tin) {
        $this->id = $id;
        $this->maMH = $ma;
        $this->tenMH = $ten;
        $this->soTin = $tin;
    }
}
?>