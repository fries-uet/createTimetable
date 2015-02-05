/**
 * Created by Tu on 05/2/2015.
 */

var MAXBG = 10;
var numSubject = 1;

//Add Scroll for List Subject
$(function(){
    $(".list-subject").jScrollPane();
});

function addSubject() {
    document.getElementById("demo-add").innerHTML = "<div>Công nghệ phần mềm</div><div><kbd>INT2203 4</kbd> - <kbd>T4 : 8-10</kbd></div>";
    document.getElementById("demo-sub").outerHTML = "";
    document.getElementById("demo-add").setAttribute("rowspan", "2");
    document.getElementById("demo-add").setAttribute("class", "bg-subject-" + 1);
}

function addSubject(content, location, num) {
    var id = "location-" + location;

    var str = content.innerHTML.toString();
    var nameSubject = str.split("<div>")[1];
    nameSubject = nameSubject.split("</div>")[0];
    var codeSubject = str.split("<kbd>")[1];
    codeSubject = codeSubject.split("</kbd>")[0];
    l = location;
    n = num;

    document.getElementById(id).innerHTML = "<div>" + nameSubject + "<button class='close' onclick='deleteSubject(l, n);'>×</button></div><div><kbd>" + codeSubject + "</kbd></div>";
    document.getElementById(id).setAttribute("rowspan", num);
    document.getElementById(id).setAttribute("class", "bg-subject-" + numSubject);
    incNumSub();

    //Delete box
    for (var i=1; i<=num-1; i++) {
        var locationNext = location + i;
        var idNext = "location-" + locationNext;
        outer = "<!--" + document.getElementById(idNext).outerHTML + "-->";
        document.getElementById(idNext).outerHTML = outer;
    }

    ////////////////////
    //Delete Subject in list subject
    content.setAttribute("onclick", "");
    //Mark Subject was selected
    content.setAttribute("class", "bg-success")
}

function incNumSub() {
    if (numSubject == MAXBG) {
        numSubject = 1;
        return;
    }
    numSubject++;
}

function deleteSubject(location, num) {
    //var id = "location-" + location;
    //document.getElementById(id).innerHTML = "";
    //document.getElementById(id).setAttribute("rowspan", 1);
    //document.getElementById(id).setAttribute("class", "");
    //
    //var locationNext = location + i;
    //var idNext = "location-" + locationNext;
    //document.getElementById("<!--<td>").outerHTML = "<td></td>";
}