/**
 * Created by tu on 17/03/2015.
 */

function Subject (id, maMH, tenMH, soTin) {
    this.id = id;
    this.maMH = maMH;
    this.tenMH = tenMH;
    this.soTin = soTin;
    this.selected = false;
}

function Lesson (monHoc, maLMH, nhom, viTri, soTiet, giaoVien, giangDuong) {
    this.monHoc = monHoc;
    this.maLMH = maLMH;
    this.nhom = nhom;
    this.viTri = viTri;
    this.soTiet = soTiet;
    this.giaoVien = giaoVien;
    this.giangDuong = giangDuong;
    this.selected = false;
}

var listSubject = new Array();
var listLesson = new Array();

$("#btnAddSubject").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

// Lấy dữ liệu từ backend
$(document).ready(function () {
    var urlSub = "backend/getSubject.php";
    $.getJSON(urlSub, function (json) {
        var data = json.data;
        for (var i=0; i<data.length; i++) {
            var sub = new Subject(data[i].id, data[i].maMH, data[i].tenMH, data[i].soTin);
            listSubject.push(sub);

            var htmlSub = "<tr><td class='tenMH'>" + data[i].tenMH + "</td></tr>";
            $("#listSubject").append(htmlSub);
        }
    });

    var urlLess = "backend/getLesson.php";
    $.getJSON(urlLess, function (json) {
        var data = json.data;
        for (var i=0; i<data.length; i++) {
            var les = new Lesson(data[i].monHoc, data[i].maLMH, data[i].nhom, data[i].viTri, data[i].soTiet, data[i].giaoVien, data[i].giangDuong);
            listLesson.push(les);
        }
    });
});

function themLMH(id) {
    for (var i=0; i<listLesson.length; i++) {
        if (listLesson[i].monHoc == id) {
            var htmlLess = "<tr><td>" + listLesson[i].maLMH + "</td></tr>";
            $("#listLesson").append(htmlLess);
        }
    }
}