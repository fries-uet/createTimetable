function Subject(id, maMH, tenMH, soTin) {
    this.id = id;
    this.maMH = maMH;
    this.tenMH = tenMH;
    this.soTin = soTin;
    this.selected = false;
}

function Lesson(id, subID, maLMH, nhom, viTri, soTiet, giaoVien, giangDuong) {
    this.id = id;
    this.subID = subID;
    this.maLMH = maLMH;
    this.nhom = nhom;
    this.viTri = viTri;
    this.soTiet = soTiet;
    this.giaoVien = giaoVien;
    this.giangDuong = giangDuong;
    this.selected = false;
}

$("#btnAddSubject").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

var listSubject = [];
var listLesson = [];

//Get Lesson
$.getJSON("/backend/getLesson.php", function (data) {
    for (var i = 0; i < data.length; i++) {
        listLesson[i] = new Lesson(data[i].id, data[i].subID, data[i].maLMH, data[i].nhom,
            data[i].viTri, data[i].soTiet, data[i].giaoVien, data[i].giangDuong);
    }
});

//Get Subject
$.getJSON("/backend/getSubject.php", function (data) {
    for (var i=0; i<data.length; i++) {
        listSubject[i] = new Subject(data[i].id, data[i].maMH, data[i].tenMH, data[i].soTin);
        var li = "<li class='list-group-item list-group-item-info subject' target='" + listSubject[i].id + "' onclick='addSubject(this);'>" + listSubject[i].tenMH + "</li>";
        $("#list-subject").append(li);
    }
});

function addSubject(li) {
    $(li).removeClass("list-group-item-info")
    $(li).attr("onclick", "removeSubject(this)");

    var id = parseInt($(li).attr("target"));//Lấy id của môn học cần thêm
    var index = findIndex(id, listSubject);
    var containLesson = $("#list-lesson");
    if (index >=0) {
        //Thêm tất cả các lớp môn học
        var headLesson = "<li class='list-group-item list-group-item-success head-lesson'>" + listSubject[index].tenMH + "</li>";
        containLesson.append(headLesson);
        for (var i=0; i<listLesson.length; i++) {
            if (listLesson[i].subID == id) {
                var lesson = "<li class='list-group-item list-group-item-warning lesson'>" + cvtTimeLesson(listLesson[i].viTri, listLesson[i].soTiet)
                    + " | " + listLesson[i].maLMH + "</li>";
                containLesson.append(lesson);
            }
        }
    }
}

//Chuyển từ vị trí và số tiết sang dạng xâu: Thứ 4 - Tiết 8-10
function cvtTimeLesson(viTri, soTiet) {
    var str = "Thứ ";
    str += parseInt(viTri/11) + 2;
    var tietDau = parseInt(viTri % 10);
    var tietCuoi = parseInt(tietDau + soTiet - 1);
    str += " - Tiết " + tietDau + "-" + tietCuoi;
    return str;
}

function findIndex(id, arr) {
    for (var i=0; i<arr.length; i++) {
        if (arr[i].id == id) {
            return i;
        }
    }
    return -1;
}

function removeSubject(li) {
    $(li).addClass("list-group-item-info");
    $(li).attr("onclick", "addSubject(this)");
}

$(document).ready(function() {
    $('.lesson').tooltipster({
        position: "right",
        content: $("<span>Thực hành: <strong>Không có</strong></span><br><span>Giảng viên: <strong>Trương Anh Hoàng</strong></span><br><span>Giảng đường: <strong>103 G2</strong></strong></span>")
    });
});