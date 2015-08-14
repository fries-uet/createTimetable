$("#btnAddSubject").click(function() {
    $("#sidebar-wrapper").animate({top: "111px"}, 100);
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

$("#bg-sidebar").click(function() {
    $("#sidebar-wrapper").animate({top: "-600px"}, 100);
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

$("#closeListSubject").click(function() {
    $("#sidebar-wrapper").animate({top: "-600px"}, 100);
    $("#bg-sidebar").toggleClass("bg-sidebar");
});

var soMon = 0;
var soTin = 0;
var bgs = [];//Mảng chứa danh sách backgroud của lớp môn học đã được chọn
var dataMonHoc;//Chứa dữ liệu của tất cả môn học
var monHocs = [];

//Chuyển từ vị trí và số tiết sang dạng xâu: <strong>Thứ 4</strong> 8-10 (CL)
function cvtTime(viTri, soTiet, nhom) {
    var str = "<strong>Thứ ";
    str += parseInt(viTri/10) + 2;
    var tietDau = parseInt(viTri % 10);
    var tietCuoi = parseInt(tietDau + soTiet - 1);
    var theLoai;
    if (nhom === 0) {
        theLoai = "CL";
    } else {
        theLoai = "N" + nhom;
    }
    str += "</strong> " + tietDau + "-" + tietCuoi + " (" + theLoai + ")";
    return str;
}

//Chuyển từ vị trí và số tiết sang xâu: <strong>Thứ 4</strong> | Tiết 8-10 (CL)
function cvtTimeFull(viTri, soTiet, nhom) {
    var str = "Thứ ";
    str += parseInt(viTri/10) + 2;
    var tietDau = parseInt(viTri % 10);
    var tietCuoi = parseInt(tietDau + soTiet - 1);
    var theLoai;
    if (nhom === 0) {
        theLoai = "CL";
    } else {
        theLoai = "N" + nhom;
    }
    str += " | Tiết " + tietDau + "-" + tietCuoi + " (" + theLoai + ")";
    return str;
}

//Thêm môn học
function addSubject(index) {
    var id = dataMonHoc[index].id;
    var subject = $("#subject-" + id);
    subject.removeClass("list-group-item-info");
    subject.addClass("list-group-item-warning");
    subject.attr("onclick", "removeSubject(" + index + ")");

    var subjectX = $("#subjectX-" + id);
    subjectX.show();

    $("#tick-subject-" + id).show();
}

//Xóa môn học
function removeSubject(index) {
    var id = dataMonHoc[index].id;
    var subject = $("#subject-" + id);
    subject.addClass("list-group-item-info");
    subject.removeClass("list-group-item-warning");
    subject.attr("onclick", "addSubject(" + index + ")");

    var subjectX = $("#subjectX-" + id);
    subjectX.hide();

    $("#tick-subject-" + id).hide();
}

//Thêm thông tin chi tiết của lớp môn học
function infoLesson() {
    for (var i = 0; i < dataMonHoc.length; i++) {
        var lopMHs = dataMonHoc[i].lopMHs;
        var tenMH = dataMonHoc[i].tenMH;

        for (var j = 0; j < lopMHs.length; j++) {
            var id = lopMHs[j].id;
            var maLMH = lopMHs[j].maLMH;

            var html = "<div>";
            html += "<span style='text-align: center; font-weight: bold;'>" + tenMH + "</span><br>";
            html += "<span>Mã LMH: " + maLMH + "</span><br>";
            var buoihocs = lopMHs[j].buoihocs;
            for (var t = 0; t < buoihocs.length; t++) {
                var viTri = buoihocs[t].viTri;
                var soTiet = buoihocs[t].soTiet;
                var nhom = buoihocs[t].nhom;
                var giaoVien = buoihocs[t].giaoVien;
                var giangDuong = buoihocs[t].giangDuong;
                var thoiGian = cvtTimeFull(viTri, soTiet, nhom);

                var buoi = "<br><span> " + thoiGian + "</span><br>";
                buoi += "<span style='padding-left: 4px;'>- Giảng viên: " + giaoVien + "</span><br>"
                    + "<span style='padding-left: 4px;'>- Giảng đường: " + giangDuong + "</span><br>";

                html += buoi;
            }
            html += "</div>";

            var lopmh = $("#lopmh-" + id);
            lopmh.tooltipster({
                theme   : "tooltipster-light",
                position: "right",
                content : $(html),
                delay   : 500,
                trigger : 'hover',
                animation: 'fade',
                hideOnClick: true
            });
        }
    }
}

// Get dữ liệu từ phía server
$(document).ready(function () {
    $.ajax({
        url     : "./api/v1/data",
        method  : "GET",
        dataType: "json",
        success : function(data) {
            dataMonHoc = data;

            for (var i=0; i<data.length; i++) {
                //Khởi tạo DOM cho danh sách môn học
                var id = data[i].id;
                var li = "<li class='list-group-item list-group-item-info monhoc' id='subject-" + id + "' onclick='addSubject(" + i +");'>"
                    + data[i].tenMH + "<span class='glyphicon glyphicon-ok tick-status' id='tick-subject-" + id + "' style='display: none'></span></li>";
                $("#list-subject").append(li);

                //Khởi tạo DOM cho #list-lesson
                var listLessonHTML = "<div id='subjectX-" + id + "' style='display: none'><li class='list-group-item list-group-item-success head-lesson'>"
                    + data[i].tenMH + "<span class='glyphicon glyphicon-remove btn-remove' onclick='removeSubject(" + i + ");'></span></li>";

                var lopMHs = data[i].lopMHs;
                for (var j = 0; j < lopMHs.length; j++) {
                    listLessonHTML += "<li class='list-group-item lopmh list-group-item-info' onclick='themLMH(" + i + "," + j + ");' id='lopmh-" + lopMHs[j].id + "'>";
                    var buoihocs = lopMHs[j].buoihocs;
                    for (var t = 0; t < buoihocs.length - 1; t++) {
                        listLessonHTML += cvtTime(buoihocs[t].viTri, buoihocs[t].soTiet, buoihocs[t].nhom) + " | ";
                    }
                    listLessonHTML += cvtTime(buoihocs[buoihocs.length - 1].viTri, buoihocs[buoihocs.length - 1].soTiet, buoihocs[buoihocs.length - 1].nhom);

                    listLessonHTML += "<span class='glyphicon glyphicon-ok tick-status' id='tick-lopmh-" + lopMHs[j].id + "' style='display: none'></span></li>";
                }

                listLessonHTML += "</div>";

                $("#list-lesson").append(listLessonHTML);
            }
            infoLesson();

            //Chèn thêm thông báo không tìm kiếm thấy môn nào
            var empty = "<li id='search-empty-monhoc' class='list-group-item list-group-item-info' style='display: none'>Không có môn nào phù hợp</li>";
            $("#list-subject").append(empty);
        },
        cache: true
    });
});

//Thêm lớp môn học vào lịch tuần
function themLMH(mon, lop) {
    var monhoc = dataMonHoc[mon];
    var tenMH = monhoc.tenMH;
    var lopMHs = monhoc.lopMHs;

    var lopMH = lopMHs[lop];
    var maLMH = lopMH.maLMH;
    var buoihocs = lopMH.buoihocs;

    for (var i = 0; i < buoihocs.length; i++) {
        var viTri = buoihocs[i].viTri;
        var soTiet = buoihocs[i].soTiet;

        //Kiểm tra xem có bị trùng thời gian hay không?
        if (ktTrungThoiGian(viTri, soTiet)) {
            thongBao("<strong>Trùng lịch!</strong><br>Buổi học đó của bạn đã bị trùng!", "error");
            return;
        }
    }

    if (ktTrungMon(monhoc.id)) {
        thongBao("<strong>Trùng môn</strong><br>Bạn đã đăng ký môn này!", "warning");
    }

    var bg = getBG(lopMH.id);
    for (var i = 0; i < buoihocs.length; i++) {
        var viTri = buoihocs[i].viTri;
        var soTiet = buoihocs[i].soTiet;
        var nhom = buoihocs[i].nhom;
        var theLoai;
        if (nhom === 0) {
            theLoai = "CL";
        } else {
            theLoai = "N" + nhom;
        }

        //Thêm buổi học vào lịch tuần
        var location = $("#location-" + viTri);//Định vị ô cần chèn
        var buoiHTML = "<div><button class='close' title='Bỏ chọn' onclick='xoaLMH(" + mon + "," + lop + ");'>×</button><span class='name-subject'>"
            + tenMH + "</span><span>" + maLMH + " (" + theLoai + ")</span></div>";
        location.html(buoiHTML);
        location.attr("rowspan", soTiet);
        location.addClass("bg-lesson-" + bg);

        //Ẩn những ô thừa
        for (var j = viTri + 1; j < viTri + soTiet; j++) {
            $("#location-" + j).hide();
        }
    }

    var lopmhDOM = $("#lopmh-" + lopMH.id);
    lopmhDOM.removeClass("list-group-item-info");
    lopmhDOM.addClass("list-group-item-warning");
    lopmhDOM.attr("onclick", "xoaLMH(" + mon + "," + lop + ")");
    var tickDOM = $("#tick-lopmh-" + lopMH.id);
    tickDOM.show();

    addMHtoArr(monhoc.id);
    soMon++;
    soTin += monhoc.soTin;

    updateInfo();
}

//Xóa lớp môn học khỏi lịch tuần
function xoaLMH(mon, lop) {
    var monhoc = dataMonHoc[mon];
    var lopMHs = monhoc.lopMHs;

    var lopMH = lopMHs[lop];
    var buoihocs = lopMH.buoihocs;

    for (var i = 0; i < buoihocs.length; i++) {
        var viTri = buoihocs[i].viTri;
        var soTiet = buoihocs[i].soTiet;

        //Làm rỗng ô
        var location = $("#location-" + viTri);//Định vị ô cần làm rỗng
        location.empty();
        location.attr("rowspan", 1);
        location.attr("class", "");

        //Hiện lại những ô bị ẩn
        for (var j = viTri + 1; j < viTri + soTiet; j++) {
            $("#location-" + j).show();
        }
    }

    var lopmhDOM = $("#lopmh-" + lopMH.id);
    lopmhDOM.addClass("list-group-item-info");
    lopmhDOM.removeClass("list-group-item-warning");
    lopmhDOM.attr("onclick", "themLMH(" + mon + "," + lop + ")");
    var tickDOM = $("#tick-lopmh-" + lopMH.id);
    tickDOM.hide();

    removeBG(lopMH.id);
    removeMHformArr(monhoc.id);
    soMon--;
    soTin -= monhoc.soTin;

    updateInfo();
}

//Update số môn và số tín
function updateInfo() {
    $("#soMon").text(soMon);
    $("#soTin").text(soTin);
}

//Kiểm tra xem có trùng thời gian trên lịch tuần không?
function ktTrungThoiGian(viTri, soTiet) {
    for (var i=viTri; i<viTri + soTiet; i++) {
        var locationID = $("#location-" + i);

        if (locationID.text()) {
            var x = locationID.attr("class");
            locationID.addClass("animated shake").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $(this).removeClass();
                $(this).attr("class", x);
            });
            return true;
        }

        if (locationID.css("display") == "none") {
            var begin = parseInt(i / 10) * 10;
            for (var j = i - 1; j >= begin; j--) {
                var temp = $("#location-" + j);
                if (temp.html() != "") {
                    var x = temp.attr("class");
                    temp.addClass("animated shake").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass();
                        $(this).attr("class", x);
                    });
                    break;
                }
            }
            return true;
        }
    }

    return false;
}

//Tìm background hợp lý để thêm vào lớp môn học vừa được chọn
function getBG(item) {
    for (var i=0; i<bgs.length; i++) {
        if (bgs[i] == -1) {
            bgs[i] = item;
            return i;
        }
    }

    bgs.push(item);
    return bgs.length - 1;
}

//Xóa background của lớp môn học đã bị xóa ra khỏi list bgs
function removeBG(item) {
    var i = bgs.indexOf(item);
    if (i >= 0) {
        bgs[i] = -1;
    }
}

//Thêm id của môn học vào list môn học để theo dõi môn nào đã được chọn
function addMHtoArr(id) {
    for (var i = 0; i < monHocs.length; i++) {
        if (bgs[i] === -1) {
            bgs[i] = id;
            return;
        }
    }

    monHocs.push(id);
}

//Xóa id môn học khỏi list môn học
function removeMHformArr(id) {
    var i = monHocs.indexOf(id);
    if (i >= 0) {
        monHocs[i] = -1;
    }
}

//Kiểm tra có đăng ký trùng môn không?
function ktTrungMon(id) {
    return (monHocs.indexOf(id) >= 0);
}

//Tìm kiếm môn học
$("#search-monhoc").keyup(function() {
    var text = $(this).val().trim().toLowerCase();
    text = bodauTiengViet(text);
    $(".monhoc").hide();
    var seachEmpty = $("#search-empty-monhoc");
    seachEmpty.hide();
    var empty = true;

    for (var i = 0; i < dataMonHoc.length; i++) {
        var tenMH = dataMonHoc[i].tenMH.toLowerCase();
        tenMH = bodauTiengViet(tenMH);
        var maMH = dataMonHoc[i].maMH.toLowerCase();
        var id = dataMonHoc[i].id;
        if (tenMH.indexOf(text) >= 0 || maMH.indexOf(text) >= 0) {
            $("#subject-" + id).show();
            empty = false;
        }
    }
    if (empty == true) {
        seachEmpty.show();
    }
});

//Bỏ dấu Tiếng Việt sang không dấu
function bodauTiengViet(str) {
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    return str;
}