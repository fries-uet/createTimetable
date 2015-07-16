<?php
/**
 * Class LopMH
 * PHP version 5
 * @category Class
 * @package API
 * @author Fries UET <fries.uet@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link http://fries.ga
 */

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