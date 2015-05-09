<?php
/**
 * Class MonHoc
 * PHP version 5
 * @category Class
 * @package API
 * @author Fries UET <fries.uet@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link http://fries.ga
 */


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