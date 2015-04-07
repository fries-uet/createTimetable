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
$.getJSON("./backend/getLesson.php", function (data) {
    for (var i = 0; i < data.length; i++) {
        listLesson[i] = new Lesson(data[i].id, data[i].subID, data[i].maLMH, data[i].nhom,
            data[i].viTri, data[i].soTiet, data[i].giaoVien, data[i].giangDuong);
    }
});

//Get Subject
$.getJSON("./backend/getSubject.php", function (data) {
    for (var i=0; i<data.length; i++) {
        listSubject[i] = new Subject(data[i].id, data[i].maMH, data[i].tenMH, data[i].soTin);
        var li = "<li class='list-group-item list-group-item-info subject' target='" + i + "' onclick='addSubject(this);'>" + listSubject[i].tenMH + "</li>";
        $("#list-subject").append(li);
    }
});

function addSubject(li) {
    //Phần hiệu ứng
    $(li).removeClass("list-group-item-info");
    $(li).attr("onclick", "removeSubject(this)");

    //Phần thuật toán và thêm bớt DOM
    var index = parseInt($(li).attr("target"));//Lấy index của môn học cần thêm trong mảng listSubject
    var containLesson = $("#list-lesson");
    listSubject[index].selected = true;

    //Thêm tất cả các lớp môn học
    var listLessonHTML = "<div id='subject-" + listSubject[index].id + "'><li class='list-group-item list-group-item-success head-lesson'>" + listSubject[index].tenMH + "</li>";
    for (var i=0; i<listLesson.length; i++) {
        if (listLesson[i].subID == listSubject[index].id) {
            listLessonHTML += "<li class='list-group-item list-group-item-info lesson' onclick='addLesson(this);' target='" + i + "' subject='" + index + "'>"
            + cvtTimeLesson(listLesson[i].viTri, listLesson[i].soTiet) + " | " + listLesson[i].maLMH + "</li>";
        }
    }

    listLessonHTML += "</div>";
    containLesson.append(listLessonHTML);
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

function removeSubject(li) {
    $(li).addClass("list-group-item-info");
    $(li).attr("onclick", "addSubject(this)");

    var index = parseInt($(li).attr("target"));
    $("#subject-" + listSubject[index].id).remove();
}

function addLesson(li) {
    $(li).removeClass("list-group-item-info");
    $(li).addClass("list-group-item-warning");
    $(li).attr("onclick", "removeLesson(this)");
    $(li).css("color", "#bcbcbc");

    var index = parseInt($(li).attr("target"));//Index của lesson
    var isub = parseInt($(li).attr("subject"));//Index của subject
    if (listLesson[index].soTiet > 1) {
        var viTri = $("#location-" + listLesson[index].viTri);
        var lessonHTML = "<div target='" + index + "'>" + "<span class='name-subject'>" + listSubject[isub].tenMH + "</span><span>" + listLesson[index].maLMH + "</span></div>";
        viTri.html(lessonHTML);
        viTri.attr("rowspan", listLesson[index].soTiet);
        viTri.addClass("bg-success");

        for (var i=1; i<listLesson[index].soTiet; i++) {
            var idDelete = listLesson[index].viTri + i;
            var trDelete = $("#location-" + idDelete);
            trDelete.remove();
        }
    }
}

function removeLesson(li) {
    $(li).removeClass("list-group-item-warning");
    $(li).addClass("list-group-item-info");
    $(li).attr("onclick", "addLesson(this)");
    $(li).attr("style", "");
}

//$(document).ready(function() {
//    $('.lesson').tooltipster({
//        theme: "tooltipster-light",
//        position: "right",
//        content: $("<span>Thực hành: <strong>Không có</strong></span><br><span>Giảng viên: <strong>Trương Anh Hoàng</strong></span><br><span>Giảng đường: <strong>103 G2</strong></strong></span>")
//    });
//});