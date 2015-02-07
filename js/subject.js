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
    //var id = cvtNum2id(loc);

    //Đưa ô về trạng thái rỗng
    //document.getElementById(id).innerHTML = "Deleted!";
    //document.getElementById(id).setAttribute("rowspan", 1);
    //document.getElementById(id).setAttribute("class", "");

    //Khởi tạo lại những ô đã bị gộp
    //var locationNext = loc + i;
    //var idNext = "location-" + locationNext;
    //document.getElementsByName("<!--<td>")[0].outerHTML = "<td></td>";

    //Kích hoạt lại onclick cho môn học ở listSubject
    //alert(codeSubject);
    //document.getElementById(codeSubject).setAttribute("onclick", "addSubject(this," + loc + "," + num + ");");
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