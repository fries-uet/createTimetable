/**
 * Created by MinhThai on 2/9/2015.
 */

var data= []    //Mảng data[] Lưu danh sách các môn học.

function getData(){
    var subject={name: "", code:"",teacher:"", tinChi:"", group:"", day:"", start:"", end:""};
    subject.name=       document.getElementById("name").value;
    subject.code=       document.getElementById("code").value;
    subject.teacher=    document.getElementById("teacher").value;
    subject.tinChi=     document.getElementById("tinChi").value;
    subject.group=      document.getElementById("group").value;
    subject.day=        document.getElementById("day").value;
    subject.start=      document.getElementById("start").value;
    subject.end=        document.getElementById("end").value;

    if(subject.name ==""){
        alert("Bạn chưa nhập Tên Môn Học");
    }
    else if(subject.code ==""){
        alert("Bạn chưa nhập Mã Môn Học");
    }
    else if(subject.teacher ==""){
        alert("Bạn chưa nhập Tên Giảng Viên");
    }
    else {
        data.push(subject) ;
        //alert(data[0].name + "  " + data[0].code );
    }
    printLeftTable();

}
//
//Hàm in danh sách môn học. (Bên trái)
function printLeftTable(){
    var leftTable="";
    for(var i=0; i<data.length; i++){
        leftTable+= "<tr><td><button class='close' onclick='deleteLeftSubject(\""+data[i].code+"\");'>×</button><div><b>"+data[i].name+"</b></div>";
        leftTable+= "<div>"+data[i].teacher+"</div>";
        leftTable+= "<div>"+data[i].code+"  Thứ "+data[i].day+":  "+data[i].start+"-"+data[i].end+"</div>"+"</td></tr>"
    }
    document.getElementById("leftTable").innerHTML= leftTable;
}

//Hàm xóa môn học trong bảng bên trái

function deleteLeftSubject(code){
   for(var i=0; i<data.length; i++){
        if(data[i].code== code){
            for(var j=i; j<data.length-1; j++){
                data[j]= data[j+1];
            }
            delete data[data.length-1];
            data.length-=1;
        }
   }
    printLeftTable();
}
function ShowGroup(){
    document.getElementById("showGroup").setAttribute("style", "display: block");
    document.getElementById("group").innerHTML= "<option>1</option> <option>2</option> <option>3</option>";
}
function HideGroup(){
    document.getElementById("showGroup").setAttribute("style","display: none");
    document.getElementById("group").innerHTML= "<option>0</option>";
}