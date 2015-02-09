/**
 * Created by Tu on 05/2/2015.
 */

var MAXBG = 10;//Số màu nền của môn học tối đa trong bảng thời khóa biểu
var numSubject = 1;

//Add Scroll for List Subject
//$(function(){
//    $(".list-subject-scroll").jScrollPane();
//});

//Mảng lưu giá trị background của môn
var arrBG = new Array();

//Xóa phần tử của mảng
Array.prototype.deleteA = function(item) {
    var index = this.indexOf(item);
    if (index>=0) {
        this.splice(index, 1);
    }
    return index;
}

listRow = new Array(10);
listRow[1] = "<td title=\"7h - 7h50'\">1</td> <td id=\"location-1\"></td> <td id=\"location-11\"></td> <td id=\"location-21\"></td> <td id=\"location-31\"></td> <td id=\"location-41\"></td>";
listRow[2] = "<td title=\"8h - 8h50'\">2</td> <td id=\"location-2\"></td> <td id=\"location-12\"></td> <td id=\"location-22\"></td> <td id=\"location-32\"></td> <td id=\"location-42\"></td>";
listRow[3] = "<td title=\"9h - 9h50'\">3</td> <td id=\"location-3\"></td> <td id=\"location-13\"></td> <td id=\"location-23\"></td> <td id=\"location-33\"></td> <td id=\"location-43\"></td>";
listRow[4] = "<td title=\"10h - 10h50'\">4</td> <td id=\"location-4\"></td> <td id=\"location-14\"></td> <td id=\"location-24\"></td> <td id=\"location-34\"></td> <td id=\"location-44\"></td>";
listRow[5] = "<td title=\"11h - 11h50'\">5</td> <td id=\"location-5\"></td> <td id=\"location-15\"></td> <td id=\"location-25\"></td> <td id=\"location-35\"></td> <td id=\"location-45\"></td>";
listRow[6] = "<td title=\"13h - 13h50'\">6</td> <td id=\"location-6\"></td> <td id=\"location-16\"></td> <td id=\"location-26\"></td> <td id=\"location-36\"></td> <td id=\"location-46\"></td>";
listRow[7] = "<td title=\"14h - 14h50'\">7</td> <td id=\"location-7\"></td> <td id=\"location-17\"></td> <td id=\"location-27\"></td> <td id=\"location-37\"></td> <td id=\"location-47\"></td>";
listRow[8] = "<td title=\"15h - 15h50'\">8</td> <td id=\"location-8\"></td> <td id=\"location-18\"></td> <td id=\"location-28\"></td> <td id=\"location-38\"></td> <td id=\"location-48\"></td>";
listRow[9] = "<td title=\"16h - 16h50'\">9</td> <td id=\"location-9\"></td> <td id=\"location-19\"></td> <td id=\"location-29\"></td> <td id=\"location-39\"></td> <td id=\"location-49\"></td>";
listRow[10] = "<td title=\"17h - 17h50'\">10</td> <td id=\"location-10\"></td> <td id=\"location-20\"></td> <td id=\"location-30\"></td> <td id=\"location-40\"></td> <td id=\"location-50\"></td>";

//Vẽ lại bảng thời khóa biểu
function printTable() {
    for (var i=1; i<=10; i++) {
        var row = "lesson-"+i;
        document.getElementById(row).innerHTML = listRow[i];
    }
}

//Kiểm tra xem có bị trùng lịch hay không?
function test(loc, num) {
    for (var i=loc; i<loc+num; i++) {
        var id = cvtNum2id(i);
        if (document.getElementById(id) == null) return false;
        if (document.getElementById(id).innerHTML != "") return false;
    }

    return true;
}

//Chuyển số sang dạng String "id" của mỗi ô trong bảng
function cvtNum2id(num) {
    return  "location-" + num;
}

//function incNumSub() {
//    if (numSubject == MAXBG) {
//        numSubject = 1;
//        return;
//    }
//    numSubject++;
//}

//Khởi tạo giả lập
var listSubjectInput = new Array();
listSubjectInput[0] = new Subject("INT2209 1", "Mạng máy tính", 1, 2);
listSubjectInput[1] = new Subject("INT2209 1-1", "Mạng máy tính (N1)", 32, 2);
listSubjectInput[2] = new Subject("INT2209 1-2", "Mạng máy tính (N2)", 32, 2);
listSubjectInput[3] = new Subject("INT2209 1-3", "Mạng máy tính (N3)", 34, 2);
listSubjectInput[4] = new Subject("INT2208 4", "Công nghệ phần mềm", 28, 3);
listSubjectInput[5] = new Subject("INT2206 4", "Nguyên lý hệ điều hành", 6, 3);
listSubjectInput[6] = new Subject("INT1050 3", "Toán học rời rạc", 16, 2);
listSubjectInput[7] = new Subject("INT1050 3", "Toán học rời rạc", 24, 2);
listSubjectInput[8] = new Subject("PHI1005 5", "Những nguyên lý cơ bản của Chủ nghĩa Mác-Lênin 2", 3, 3);
listSubjectInput[9] = new Subject("BSA2002 2", "Nguyên lý marketing", 46, 3);
listSubjectInput[10] = new Subject("PES1550 49", "Lý luận GDTC và các môn thể thao cơ bản", 36, 2);
listSubjectInput[11] = new Subject("MAT1104 2", "Giải tích 1", 17, 2);

//In danh sách các môn học ở cột bên trái
function printListSubject() {
    var inner = "";
    for (var i=0; i<listSubjectInput.length; i++) {
        var name = listSubjectInput[i].name;
        var number = listSubjectInput[i].number;
        var location = listSubjectInput[i].location;
        var code = listSubjectInput[i].code;
        var time = cvtLocation2Time(location, number);
        var onclick, bg;
        if (listSubjectInput[i].selected) {
            onclick = "";
            bg = "class=\"bg-success\"";
        }
        else {
            onclick = "onclick=\"addSubject(" + i + ");\"";
            bg = "";
        }
        inner += "<tr>" + "<td " + onclick + " " + bg + " id=\"" + code + "\"><div>" + name + "</div><div><kbd>" + code + "</kbd> - <kbd>" + time + "</kbd></div></td></tr>";
    }
    document.getElementById("listSubject").innerHTML = inner;
}

function addSubject(index) {
    var location = listSubjectInput[index].location;
    var number = listSubjectInput[index].number;

    if (!test(location, number)) {
        alert("Trùng môn");
        return;
    }

    //Thêm môn học vào mảng thời khóa biểu
    timeTable.push(index);
    //alert(timeTable);

    var id = cvtNum2id(location);
    var name = listSubjectInput[index].name;
    var code = listSubjectInput[index].code;

    document.getElementById(id).innerHTML = "<button class='close' onclick='deleteSubject(" + index + ");'>×</button><div>" + name + "</div><kbd>" + code + "</kbd>";
    document.getElementById(id).setAttribute("rowspan", number);
    document.getElementById(id).setAttribute("class", "bg-subject-" + timeTable.length);
    arrBG[timeTable.length - 1] = timeTable.length;

    //Delete box
    for (var i=1; i<=number-1; i++) {
        var locationNext = location + i;
        var idNext = cvtNum2id(locationNext);
        document.getElementById(idNext).outerHTML = "";
    }
    listSubjectInput[index].selected = true;
    printListSubject();

    document.getElementById("numberSubject").innerHTML = timeTable.length;
}

function reAddSubject(index, bg) {
    var location = listSubjectInput[index].location;
    var number = listSubjectInput[index].number;

    var id = cvtNum2id(location);
    var name = listSubjectInput[index].name;
    var code = listSubjectInput[index].code;

    document.getElementById(id).innerHTML = "<button class='close' onclick='deleteSubject(" + index + ");'>×</button><div>" + name + "</div><kbd>" + code + "</kbd>";
    document.getElementById(id).setAttribute("rowspan", number);
    document.getElementById(id).setAttribute("class", "bg-subject-" + bg);

    //Delete box
    for (var i=1; i<=number-1; i++) {
        var locationNext = location + i;
        var idNext = cvtNum2id(locationNext);
        document.getElementById(idNext).outerHTML = "";
    }
}

//Danh sách các môn học ở bảng thời khóa biểu
var timeTable = new Array();

//Xóa phần tử khỏi mảng timeTable
function deleteItemInArr(arr, index) {

}
//Tìm vị trí của môn học trọng mảng
function findSubjectInArr(arr, code) {
    for (i=0; i<arr.length; i++) {
        if (arr[i].code == code) return i;
    }
    return -1;
}

//Xóa môn học khỏi bảng thời khóa biểu
function deleteSubject(item) {
    var index = timeTable.deleteA(item);
    arrBG.deleteA(arrBG[index]);
    //timeTable.deleteA(item);
    listSubjectInput[item].selected = false;
    printListSubject();
    printTable();
    for (var i=0; i<timeTable.length; i++) reAddSubject(timeTable[i], arrBG[i]);
    //alert(timeTable);
    document.getElementById("numberSubject").innerHTML = timeTable.length;
}

//Class Subject
function Subject (code, name, location, number) {
    this.code = code;
    this.name = name;
    this.location = location;
    this.number = number;
    this.selected = false;
}

//Chuyển location và number sang dạng Thứ và Tiết
function cvtLocation2Time(location, number) {
    var day = parseInt(location / 10) + 2;
    var time = "T" + day + " : ";
    var first = parseInt(location%10);
    var end = first + number - 1;
    time += first + "-" + end;
    return time;
}