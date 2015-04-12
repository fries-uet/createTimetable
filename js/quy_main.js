var locationState = new Array();    // Trạng thái của bảng được lưu vào mảng này:
                                    // locationState[index]=value :
                                    //      index: vị trí location trên bảng
                                    //      value: giá trị của location:    0: chưa lựa chọn gì
                                    //                                      1: tick chọn ưu tiên
                                    //                                      -1: tick chọn bỏ qua

function sidebarShow(idSidebar){
    $("#"+idSidebar).toggleClass("toggled");
}

function chooseLocation(id){
    var pos = id.lastIndexOf("-")+1;
    var loc = id.substr(pos);
    if ($("#"+id).attr("class") == ""){ // Chưa có class nào: trạng thái chưa được tick
        $("#"+id).addClass("tick");
        document.getElementById(id).innerHTML = "&#x2714";  // Vẽ dấu tick V
        locationState[loc] = 1;         // locationState được đánh dấu chọn

    }
    else {
        if ($("#"+id).attr("class") == "tick"){     // Đã được tick chọn
            $("#"+id).removeClass("tick");
            $("#"+id).addClass("lock");             // Đánh dấu là "bỏ qua"
            document.getElementById(id).innerHTML = "&#x2718";  // vẽ dấu X
            locationState[loc] = -1;
        }
        else{
            $("#"+id).removeClass("lock");
            document.getElementById(id).innerHTML = "";
            locationState[loc] = 0;
        }
    }
    //alert(loc + " : " + locationState[loc]);
}

function createArrayLocation(){
    for (i=0; i<51; i++){
        location.push(0);
        s +=  locationState[i];
    }
}
createArrayLocation();