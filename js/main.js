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
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

$("#bg-sidebar").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

var MAXLESSON = 20;
var listSubject = [];
var listLesson = [];
var soMon = 0;
var soTin = 0;
var bg = [];
for (var i=0; i<MAXLESSON; i++) {
    bg[i] = false;
}

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
            var classL = "list-group-item-info";
            var click = "addLesson(this)";
            var style = "";
            if (listLesson[i].selected) {
                classL = "list-group-item-warning";
                click = "removeLessonX()";
                style = "color:#bcbcbc";
            }
            listLessonHTML += "<li class='list-group-item lesson " + classL + "' id='lesson-" + i + "' onclick='" + click + "' target='" + i + "' subject='" + index + "' style='" + style + "'>"
            + cvtTimeLesson(listLesson[i].viTri, listLesson[i].soTiet) + " | " + listLesson[i].maLMH + "</li>";
        }
    }

    listLessonHTML += "</div>";
    containLesson.append(listLessonHTML);
}

//Chuyển từ vị trí và số tiết sang dạng xâu: Thứ 4 - Tiết 8-10
function cvtTimeLesson(viTri, soTiet) {
    var str = "Thứ ";
    str += parseInt(viTri/10) + 2;
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
    listSubject[index].selected = false;
}

function addLesson(li) {
    var index = parseInt($(li).attr("target"));//Index của lesson
    var isub = parseInt($(li).attr("subject"));//Index của subject

    //if ($(li).parent().attr("target") == "selected") {
    //    thongBao("Bạn đã chọn môn học đó rồi!", "warning");
    //    return;
    //}

    if (ktTrungMon(listLesson[index].viTri, listLesson[index].soTiet)) {
        thongBao("Môn học đã bị trùng thời gian", "warning");
        return;
    }

    $(li).parent().attr("target", "selected");
    $(li).removeClass("list-group-item-info");
    $(li).addClass("list-group-item-warning");
    $(li).attr("onclick", "removeLessonX()");
    $(li).css("color", "#bcbcbc");

    var viTri = $("#location-" + listLesson[index].viTri);
    var lessonHTML = "<div><button class='close' onclick=\"removeLesson(" + index + ")\">×</button><span class='name-subject'>" + listSubject[isub].tenMH + "</span><span>" + listLesson[index].maLMH + "</span></div>";
    viTri.html(lessonHTML);
    viTri.attr("rowspan", listLesson[index].soTiet);
    viTri.addClass("bg-lesson-" + soMon);

    //Xóa những ô bị thừa
    for (var i=1; i<listLesson[index].soTiet; i++) {
        var idDelete = listLesson[index].viTri + i;
        var trDelete = $("#location-" + idDelete);
        trDelete.remove();
    }

    soMon++;
    soTin += parseInt(listSubject[isub].soTin);
    listLesson[index].selected = true;
    updateInfo();
}

function removeLesson(index) {
    soMon--;
    updateInfo();
    listLesson[index].selected = false;

    li = $("#lesson-" + index);
    $(li).removeClass("list-group-item-warning");
    $(li).addClass("list-group-item-info");
    $(li).attr("onclick", "addLesson(this)");
    $(li).attr("style", "");

    var viTri = listLesson[index].viTri;
    var soTiet = listLesson[index].soTiet;
    var locationID = $("#location-" + viTri);
    locationID.empty();
    locationID.attr("class", "");
    locationID.attr("rowspan", 1);
    //Khởi tạo lại những ô bị xóa
    for (var i = viTri + 1; i<viTri + soTiet; i++) {
        rewriteTD(i);
    }
}

function removeLessonX() {

}

function rewriteTD(id) {
    var td = "<td id='location-" + id + "'></td>";
    if (id<=10) {
        var forward = $("#location-0" + id);
        forward.after(td);
    } else {
        var forwarID = id - 10;
        var forward = $("#location-" + forwarID);
        forward.after(td);
    }

}

function updateInfo() {
    $("#soMon").text(soMon);
    $("#soTin").text(soTin);
}

function ktTrungMon(viTri, soTiet) {
    for (var i=viTri; i<viTri + soTiet; i++) {
        var locationID = $("#location-" + i);

        if (!locationID.length) {
            return true;
        }

        if (locationID.text()) {
            return true;
        }
    }

    return false;
}

function thongBao(text, type) {
    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        closeWith   : ['click', 'backdrop'],
        modal       : true,
        layout      : 'topCenter',
        theme       : 'defaultTheme',
        maxVisible  : 10
    });
}

//Chọn màu nền cho lớp môn học ở TKB tuần
function chooseBackground() {

    return index;
}

//$(document).ready(function() {
//    $('.lesson').tooltipster({
//        theme: "tooltipster-light",
//        position: "right",
//        content: $("<span>Thực hành: <strong>Không có</strong></span><br><span>Giảng viên: <strong>Trương Anh Hoàng</strong></span><br><span>Giảng đường: <strong>103 G2</strong></strong></span>")
//    });
//});