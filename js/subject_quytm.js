/**
 * Created by Quy on 07/2/2015.
 */

var MAXBG = 10;
var numSubject = 1;
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

function printTable(){
    //for (var i=1; i<=10; i++) {
    //    var row = "Tiet"+i;
    //    document.getElementById("Tiet1").innerHTML = "dskfdnskgnj";//listRow[t];
    //}
    document.getElementById("Tiet1").innerHTML = "skadhfksdf";
}



//Add Scroll for List Subject
$(function(){
    $(".list-subject").jScrollPane();
});

function incNumSub() {
    if (numSubject == MAXBG) {
        numSubject = 1;
        return;
    }
    numSubject++;
}

listSubject = new Array(10);

// Cover function addSubject of TuTV
function addSubject(content, location, num) {
    var id = "location-" + location;                //      location-1

    var str = content.innerHTML.toString();
    var nameSubject = str.split("<div>")[1];
    nameSubject = nameSubject.split("</div>")[0];   //  ->  Mạng máy tính
    var codeSubject = str.split("<kbd>")[1];
    codeSubject = codeSubject.split("</kbd>")[0];   //  ->  INT2209 1(N3)
    l = location;                                   //      location = 1
    n = num;                                        //      num = 2;

    listSubject[numSubject] = codeSubject + "," + num + "," + nameSubject;

    document.getElementById(id).innerHTML = "<div>" + nameSubject + "<button class='close' onclick='deleteSubject(l, n);'>×</button></div><div><kbd>" + codeSubject + "</kbd></div>";
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

function deleteSubject(location, num) {
    var id = "location-" + location;
    document.getElementById(id).innerHTML = "";
    document.getElementById(id).setAttribute("rowspan", 1);
    document.getElementById(id).setAttribute("class", "");

    for (var i=1; i<num; i++) {
        var t=i+parseInt(location%10);
        var row = "Tiet"+t;
        document.getElementById(row).innerHTML = listRow[t];
    }
    numSubject--;
    //printTable();
}

printTable();