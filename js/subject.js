/**
 * Created by Tu on 05/2/2015.
 */

var MAXBG = 10;
var numSubject = 1;

//Add Scroll for List Subject
$(function(){
    $(".list-subject").jScrollPane();
});

function addSubject(content, loc, num) {
    if (!test(loc, num)) {
        alert("Trùng môn!");
        return;
    }
    var id = cvtNum2id(loc);

    var str = content.innerHTML.toString();
    var nameSubject = str.split("<div>")[1];
    nameSubject = nameSubject.split("</div>")[0];
    var codeSubject = content.getAttribute("id");

    document.getElementById(id).innerHTML = "<div>" + nameSubject + "<button class='close' onclick='deleteSubject(" + loc+ "," + num + "," + codeSubject + ");'>×</button></div><div><kbd>" + codeSubject + "</kbd></div>";
    document.getElementById(id).setAttribute("rowspan", num);
    document.getElementById(id).setAttribute("class", "bg-subject-" + numSubject);
    incNumSub();

    //Delete box
    for (var i=1; i<=num-1; i++) {
        var locationNext = loc + i;
        var idNext = cvtNum2id(locationNext);
        //outer = "<!--" + document.getElementById(idNext).outerHTML + "-->";
        document.getElementById(idNext).outerHTML = "";
    }

    ////////////////////
    //Delete Subject in list subject
    content.setAttribute("onclick", "");
    //Mark Subject was selected
    content.setAttribute("class", "bg-success")
}

function deleteSubject(loc, num, codeSubject) {

}

function test(loc, num) {
    for (var i=loc; i<loc+num; i++) {
        var id = cvtNum2id(i);
        if (document.getElementById(id) == null) return false;
        if (document.getElementById(id).innerHTML != "") return false;
    }

    return true;
}

function cvtNum2id(num) {
    return  "location-" + num;
}

function incNumSub() {
    if (numSubject == MAXBG) {
        numSubject = 1;
        return;
    }
    numSubject++;
}

//Khởi tạo giả lập
var listSubjectInput = new Array();
listSubjectInput[0] = new Subject("INT2209 1", "Mạng máy tính", 1, 2);
listSubjectInput[1] = new Subject("INT2209 1-1", "Mạng máy tính (N1)", 32, 2);
listSubjectInput[2] = new Subject("INT2209 1-2", "Mạng máy tính (N2)", 32, 2);
listSubjectInput[3] = new Subject("INT2209 1-3", "Mạng máy tính (N3)", 34, 2);
listSubjectInput[4] = new Subject("INT2208 4", "Công nghệ phần mềm", 28, 3);
listSubjectInput[5] = new Subject("INT2206 4", "Nguyên lý hệ điều hành", 6, 3);
listSubjectInput[6] = new Subject("INT1050 3", "Toán học rời rạc", 16, 2);
listSubjectInput[7] = new Subject("PHI1005 5", "Những nguyên lý cơ bản của Chủ nghĩa Mác-Lênin 2", 3, 3);
listSubjectInput[8] = new Subject("BSA2002 2", "Nguyên lý marketing", 46, 3);
listSubjectInput[9] = new Subject("PES1550 49", "Lý luận GDTC và các môn thể thao cơ bản", 36, 2);
listSubjectInput[10] = new Subject("MAT1104 2", "Giải tích 1", 17, 2);

function printListSubject() {
    for (i=0; i<listSubjectInput.length; i++) {
        var name = listSubjectInput[i].name;
        var number = listSubjectInput[i].number;
        var location = listSubjectInput[i].location;
        var code = listSubjectInput[i].code;
        document.write("<tr><td onclick=\"addSubject(this," + location + "," + number + ");\" id=" + code+ "><div>" + name + "</div><div><kbd>" + code + "</kbd> - <kbd>" + cvtLocation2Time(location, number) + "</kbd></div></td></tr>");
    }
}

//Class Subject
function Subject (code, name, location, number) {
    this.code = code;
    this.name = name;
    this.location = location;
    this.number = number;
    this.tick = false;
}

function cvtLocation2Time(location, number) {
    var day = parseInt(location / 10) + 2;
    var time = "T" + day + " : ";
    var first = parseInt(location%10);
    var end = first + number - 1;
    time += first + "-" + end;
    return time;
}