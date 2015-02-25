/**
 * Created by MinhThai on 2/9/2015.
 */
var data= [];


function getData(){
    var subject={name: "", code:"", day:"", start:"", end:""};
    subject.name= document.getElementById("name").value;
    subject.code= document.getElementById("code").value;
    subject.day= document.getElementById("day").value;
    subject.start= document.getElementById("start").value;
    subject.end= document.getElementById("end").value;
    if(subject.name ==""){
        alert("Bạn chưa nhập Tên Môn Học");
    }
    else if(subject.code ==""){
        alert("Bạn chưa nhập Mã Môn Học");
    }
    else {
        data.push(subject) ;
        //alert(data[0].name + "  " + data[0].code );
    }
    printLeftTable();

}

function printLeftTable(){
    var leftTable="";
    for(var i=0; i<data.length; i++){
        leftTable+= "<tr><td><div><b>"+data[i].name+"</b></div>"+"<div >"+data[i].code+"  Thứ "+data[i].day+":  "+data[i].start+"-"+data[i].end+"</div>"+"</td></tr>";
    }
    document.getElementById("leftTable").innerHTML= leftTable;
}

function printRightTable(){

}