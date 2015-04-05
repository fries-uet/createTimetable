/**
 * Created by MinhThai on 3/29/2015.
 */


var data= []    //Mảng data[] Lưu danh sách các môn học.
// luu thong tin vo database
$( document ).ready( function(){
    list();
    $("form.form-group").on( "submit", function(){
        if( check() == false )alert( "xem lại thông tin nhập !!!" );
        else {
            var data = {};
            that = $(this);
            that.find( '[name]').each( function(){
                var that = $(this);
                var name = that.attr('name');
                var value = that.val();
                data[name] = value;
            });
            //console.log(data);

            $.ajax( {
                url : "../backend/save1.php",
                type : "POST",
                data : data,
                success : function( data ){
                    console.log(data);
                    var str = "<b>"+data+"</b>";
                    $("#success").html(str);
                    addList();
                }
            });
        }
        return false;
    });
});
// in danh sach cac mon hoc....
function list(){
    $.ajax( {
        url : "../backend/getMonHoc.php",
        type : 'post',
        dataType : 'json',
        success : function( list ){
            $.each( list, function( key, value ){
                var str;
                str += "<tr>"
                str +=         "<td style='width: 150px; text-align: left;clear: both; float: left;'>" + value['tenMH'] + "</td>";
                str +=         "<td style='width: 90px; text-align: left; float: left;'>" + value['maLMH'] + "</td>";
                str +=         "<td style='width: 130px; text-align: left; float: left;'>" + value['giaoVien'] + "</td>";
                str +="</tr>"
                $("#list").append( str );
            });
        }
    });
}
// them mon hoc vo danh sach....
function addList(){
    $.ajax( {
        url : "../backend/getMonHocCuoi.php",
        type : 'post',
        dataType : 'json',
        success : function( the_last ){
            $.each( the_last, function( key, value ){
                var str;
                str += "<tr>"
                str +=         "<td style='width: 150px; text-align: left;clear: both; float: left;'>" + value['tenMH'] + "</td>";
                str +=         "<td style='width: 90px; text-align: left; float: left;'>" + value['maLMH'] + "</td>";
                str +=         "<td style='width: 130px; text-align: left; float: left;'>" + value['giaoVien'] + "</td>";
                str +="</tr>"
                $("#list").append( str );
            });
        }
    });
}
// lam sạch form ....
function clearForm(){
    $("#success").html("<b>xem kỹ thông tin trước khi bấm</b>");
}
//kiem tra thong tin du va dung hay chua
function check(){
    if( $("#name").val() == "" )return false;
    if( $("#code").val() == "" )return false;
    if( $("#teacher").val() == "" )return false;
    if( $("#location").val() == "" )return false;
    if( isNaN( $("#tinChi").val() ) )return false;
    if( isNaN( $("#group").val() ) )return false;
    if( isNaN( $("#day").val() ) )return false;
    if( isNaN( $("#start").val() ) )return false;
    if( isNaN( $("#end").val() ) )return false;
    if( $( "#end").val() <= $( "#start").val() ) return false;
    return true;
}

function getData(){
    var subject={name: "", code:"",teacher:"", tinChi:"",  location:"", group:"", day:"", start:"", end:""};
    subject.name=       document.getElementById("name").value;
    subject.code=       document.getElementById("code").value;
    subject.teacher=    document.getElementById("teacher").value;
    subject.location=    document.getElementById("location").value;
    subject.tinChi=     document.getElementById("tinChi").value;
    subject.group=      document.getElementById("group").value;
    subject.day=        document.getElementById("day").value;
    subject.start=      document.getElementById("start").value;
    subject.end=        document.getElementById("end").value;

    if(subject.name ==""){
        alert("Bạn chưa nhập Tên Môn Học!");
    }
    else if(subject.code ==""){
        alert("Bạn chưa nhập Mã Môn Học!");
    }
    else if(subject.teacher ==""){
        alert("Bạn chưa nhập Tên Giảng Viên!");
    }
    else if(subject.location ==""){
        alert("Bạn chưa nhập Địa Điểm!");
    }
    else if(subject.end <= subject.start){
        alert("Bạn nhập Tiết học chưa đúng!")
    }
    else {
        data.push(subject) ;
        //alert(data[0].name + "  " + data[0].code );
    }
    printRightTable();
    document.getElementById("name").outerHTML= "<input id='name' type='text' class='form-control' placeholder='Nhập Tên Môn Học' value=''>";
    document.getElementById("code").outerHTML= "<input id='code' type='text' class='form-control' placeholder='Nhập Mã Môn Học' value=''>";
    document.getElementById("teacher").outerHTML= "<input id='teacher' type='text' class='form-control' placeholder='Nhập Tên Giảng Viên' value=''>";
    document.getElementById("location").outerHTML= "<input id='location' type='text' class='form-control' placeholder='Nhập Lớp và Giảng Đường' value=''>";


}
//
//Hàm in danh sách môn học. (Bên phải)
function printRightTable(){
    var leftTable="";
    for(var i=0; i<data.length; i++){
        leftTable+= "<tr><td><button class='close' onclick='deleteLeftSubject(\""+data[i].code+"\");'>×</button><div><b>"+data[i].name+"</b></div>";
        leftTable+= "<div>"+data[i].teacher+"</div>";
        leftTable+= "<div>"+data[i].code+"  Thứ "+data[i].day+":  "+data[i].start+"-"+data[i].end+"</div><button class='btn btn-default btn-xs pull-right btn-sm btn-warning' onclick='editSubject(\""+data[i].code+"\");'>Edit</button></td></tr>"
    }
    document.getElementById("leftTable").innerHTML= leftTable;
}

//Hàm xóa môn học trong bảng bên phải

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
    printRightTable();
}
function ShowGroup(){
    document.getElementById("showGroup").setAttribute("style", "display: block");
    document.getElementById("group").innerHTML= "<option>1</option> <option>2</option> <option>3</option>";
}
function HideGroup(){
    document.getElementById("showGroup").setAttribute("style","display: none");
    document.getElementById("group").innerHTML= "<option>0</option>";
}
function editSubject(code){
    for(var i=0; i<data.length; i++){
        if(data[i].code== code){
            document.getElementById("name").setAttribute("value", data[i].name);
            document.getElementById("code").setAttribute("value", data[i].code);
            document.getElementById("teacher").setAttribute("value", data[i].teacher);
            document.getElementById("location").setAttribute("value", data[i].teacher);
            for(var j=i; j<data.length-1; j++){
                data[j]= data[j+1];
            }
            delete data[data.length-1];
            data.length-=1;
        }
    }
    printRightTable();
}