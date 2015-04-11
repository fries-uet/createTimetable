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
    $("#sidebar-wrapper").animate({top: "111px"}, 100);
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

$("#bg-sidebar").click(function(e) {
    $("#sidebar-wrapper").animate({top: "-600px"}, 100);
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

$("#closeListSubject").click(function(e) {
    $("#sidebar-wrapper").animate({top: "-600px"}, 100);
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

//Get Subject and Lesson qua ajax
$.ajax({
    url: "./backend/getSubject.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
        for (var i=0; i<data.length; i++) {
            listSubject[i] = new Subject(data[i].id, data[i].maMH, data[i].tenMH, data[i].soTin);

            //Khởi tạo DOM
            var li = "<li class='list-group-item list-group-item-info subject' id='subject-" + i + "' onclick='addSubject(" + i +");'>"
                + listSubject[i].tenMH + "<span class='glyphicon glyphicon-ok tick-status' id='tick-subject-" + i + "' style='display: none'></span></li>";
            $("#list-subject").append(li);
        }

        $.ajax({
            url: "./backend/getLesson.php",
            method: "GET",
            dataType: "json",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    listLesson[i] = new Lesson(data[i].id, data[i].subID, data[i].maLMH, data[i].nhom,
                        data[i].viTri, data[i].soTiet, data[i].giaoVien, data[i].giangDuong);
                }

                //Khởi tạo DOM cho #list-lesson
                for (var i=0; i< listSubject.length; i++) {
                    var listLessonHTML = "<div id='subjectX-" + i + "' style='display: none'><li class='list-group-item list-group-item-success head-lesson'>"
                        + listSubject[i].tenMH + "<span class='glyphicon glyphicon-remove btn-remove' onclick='removeSubject(" + i +");'></span></li>";
                    for (var j=0; j<listLesson.length; j++) {
                        if (listLesson[j].subID == listSubject[i].id) {
                            listLessonHTML += "<li class='list-group-item lesson list-group-item-info" + "' id='lesson-" + j + "' target='" + i + "' onclick='addLesson(" + j + ")'>"
                            + cvtTimeLesson(listLesson[j].viTri, listLesson[j].soTiet) + " | " + listLesson[j].maLMH + "<span class='glyphicon glyphicon-ok tick-status' id='tick-lesson-" + j + "' style='display: none'></span></li>";
                        }
                    }

                    listLessonHTML += "</div>";
                    $("#list-lesson").append(listLessonHTML);
                }

                //Thêm thông tin thêm về lớp môn học
                infoLesson();
            }
        });
    }
});

function infoLesson() {
    for (var i=0; i<listLesson.length; i++) {
        var thucHanh = "Không có";
        var giangVien = listLesson[i].giaoVien;
        var giangDuong = listLesson[i].giangDuong;
        $("#lesson-" + i).tooltipster({
            theme: "tooltipster-light",
            position: "right",
            content: $("<span>Thực hành: <strong>" + thucHanh + "</strong></span><br><span>Giảng viên: <strong>" + giangVien + "</strong></span><br><span>Giảng đường: <strong>" + giangDuong + "</strong></strong></span>")
        });
    }
}

function addSubject(index) {
    var subject = $("#subject-" + index);
    subject.removeClass("list-group-item-info");
    subject.addClass("list-group-item-warning");
    subject.attr("onclick", "removeSubject(" + index + ")");

    var subjectX = $("#subjectX-" + index);
    subjectX.show();

    $("#tick-subject-" + index).show();
}

function removeSubject(index) {
    var subject = $("#subject-" + index);
    subject.addClass("list-group-item-info");
    subject.removeClass("list-group-item-warning");
    subject.attr("onclick", "addSubject(" + index + ")");

    var subjectX = $("#subjectX-" + index);
    subjectX.hide();

    $("#tick-subject-" + index).hide();
}

function addLesson(index) {
    var viTri = listLesson[index].viTri;
    var soTiet = listLesson[index].soTiet;

    if (ktTrungMon(viTri, soTiet)) {
        thongBao("Môn học đã bị trùng thời gian", "warning");
        return;
    }

    var lesson = $("#lesson-" + index);
    lesson.removeClass("list-group-item-info");
    lesson.addClass("list-group-item-warning");
    lesson.attr("onclick", "removeLesson(" + index + ")");

    var isub = lesson.attr("target");
    insert2Table(index, isub);

    $("#tick-lesson-" + index).show();

    soMon++;
    soTin += listSubject[isub].soTin;
    updateInfo();
}

function removeLesson(index) {
    var lesson = $("#lesson-" + index);
    lesson.addClass("list-group-item-info");
    lesson.removeClass("list-group-item-warning");
    lesson.attr("onclick", "addLesson(" + index + ")");

    var id = listLesson[index].viTri;
    emptyTable(id);

    //Hiện lại những ô đã bị ẩn
    for (var i=1; i<listLesson[index].soTiet; i++) {
        var idDelete = listLesson[index].viTri + i;
        var trDelete = $("#location-" + idDelete);
        trDelete.show();
    }

    $("#tick-lesson-" + index).hide();

    var isub = lesson.attr("target");
    soMon--;
    soTin -= listSubject[isub].soTin;
    updateInfo();
}

function insert2Table(index, isub) {
    var viTri = $("#location-" + listLesson[index].viTri);
    var lessonHTML = "<div><button class='close' onclick=\"removeLesson(" + index + ")\">×</button><span class='name-subject'>"
        + listSubject[isub].tenMH + "</span><span>" + listLesson[index].maLMH + "</span></div>";
    viTri.html(lessonHTML);
    viTri.attr("rowspan", listLesson[index].soTiet);
    viTri.addClass("bg-lesson-" + soMon);

    //Ẩn đi những ô bị thừa
    for (var i=1; i<listLesson[index].soTiet; i++) {
        var idDelete = listLesson[index].viTri + i;
        var trDelete = $("#location-" + idDelete);
        trDelete.hide();
    }
}

//Đưa trạng thái của ô về rỗng
function emptyTable(id) {
    var viTri = $("#location-" + id)
    viTri.empty();
    viTri.attr("class", "");
    viTri.attr("rowspan", 1);
}

function updateInfo() {
    $("#soMon").text(soMon);
    $("#soTin").text(soTin);
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