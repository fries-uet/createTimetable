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
    document.getElementById(id).innerHTML = content.outerHTML;
    document.getElementById(id).setAttribute("rowspan", num);
    document.getElementById(id).setAttribute("class", "bg-subject-" + numSubject);
    incNumSub();

    //Delete box
    for (var i=1; i<=num-1; i++) {
        var locationNext = location + i;
        var idNext = "location-" + locationNext;
        document.getElementById(idNext).outerHTML = "";
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