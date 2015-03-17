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
var soMonDK = 0;

$("#btnAddSubject").click(function (e) {
    var text = $(this).text();
    if (text == "Thêm") {
        $(this).text("Xong");
    } else {
        $(this).text("Thêm");
    }
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

            var htmlSub = "<tr onclick=\"themMH(" + data[i].id + ", this);\"><td class='tenMH'>" + data[i].tenMH + "</td></tr>";
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

function themMH(id , tr) {
    $(tr).addClass("success");
    $(tr).attr("onclick", "xoaMH(" + id + ", this);");

    for (var i=0; i<listSubject.length; i++) {
        if (listSubject[i].id == id) {
            listSubject[i].selected = true;
            for (var j=0; j<listLesson.length; j++) {
                if (listLesson[j].monHoc == id) {
                    var l = listLesson[j];
                    var htmlLess = "";
                    if (l.selected) {
                        htmlLess = "<tr class=\"monHoc-" + id + " success\" onclick=\"xoaLMH(" + j + ", this);\"><td><div>";
                    } else {
                        htmlLess = "<tr class=\"monHoc-" + id + "\" onclick=\"themLMH(" + j + ", this);\"><td><div>";
                    }

                    htmlLess += listSubject[i].tenMH + "</div><div><kbd>"
                        + l.maLMH + "</kbd> - <kbd>" + thoiGian(l.viTri, l.soTiet)
                        + "</kbd></div></td></tr>";
                    $("#listLesson").append(htmlLess);
                }
            }
            return;//Do id là duy nhất nên dừng vòng lặp luôn
        }
    }
}

function thoiGian(viTri, soTiet) {
    var day = parseInt(viTri / 10) + 2;
    var time = "T" + day + " : ";
    var first = parseInt(viTri%10);
    var end = first + soTiet - 1;
    time += first + "-" + end;
    return time;
}

function xoaMH(id, tr) {
    $(tr).removeClass("success");
    $(tr).attr("onclick", "themMH(" + id + ", this);");

    for (var i=0; i<listSubject.length; i++) {
        if (listSubject[i].id == id) {
            listSubject[i].selected = false;
            $("tr.monHoc-" + id).remove();
        }
    }
}

function themLMH(i, tr) {
    soMonDK++;
    $("#numberSubject").text(soMonDK);

    var lesson = listLesson[i];
    listLesson[i].selected = true;
    //Xóa ô thừa
    for (var j=lesson.viTri + 1; j<lesson.viTri + lesson.soTiet; j++) {
        var idXoa = chuyenDoisangID(j);
        $(idXoa).remove();
    }

    //Tìm môn học tương ứng
    var subject = listSubject[0];
    for (var t=0; t<listSubject.length; t++) {
        if (listSubject[t].id == lesson.monHoc) {
            subject = listSubject[t];
        }
    }

    //Thêm môn học vào thời khóa biểu
    var id = chuyenDoisangID(lesson.viTri);
    var htmlLess = "<!--<button class='close'>×</button>--><div>" + subject.tenMH + "</div><kbd>"
        + lesson.maLMH + "</kbd>";
    $(id).html(htmlLess);
    var bg = "bg-subject-" + i;
    $(id).addClass(bg);
    $(id).attr("rowspan", listLesson[i].soTiet);

    $(tr).addClass("success");
    $(tr).attr("onclick", "xoaLMH(" + i + ", this)");
}

function xoaLMH(i, tr) {
    soMonDK--;
    $("#numberSubject").text(soMonDK);

    var lesson = listLesson[i];
    listLesson[i].selected = false;
    //Thêm ô còn thiếu
    for (var j=lesson.viTri + 1; j<lesson.viTri + lesson.soTiet; j++) {
        var idThem = "location-" + j;
        var idSau = chuyenDoisangID(10 + j);//+ parseInt(10 + j);
        var html = "<td id=\"" + idThem + "\"></td>";
        $(idSau).before(html);
    }

    var id = chuyenDoisangID(lesson.viTri);
    $(id).html("");
    $(id).attr("rowspan", 0);
    $(id).attr("class", "");

    $(tr).removeClass("success");
    $(tr).attr("onclick", "themLMH(" + i + ", this)");
}

function chuyenDoisangID(i) {
    return "#location-" + i;
}