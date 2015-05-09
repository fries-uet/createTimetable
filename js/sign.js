//Thông báo cho người dùng biết họ gặp lỗi hay thông báo gì?
function thongBao(text, type) {
    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        closeWith   : ['click', 'backdrop', 'hover', 'button'],
        modal       : false,
        layout      : 'topLeft',
        theme       : 'relax',
        maxVisible  : 10,
        timeout: 3000,
        animation: {
            open: 'animated bounceInUp', // Animate.css class names
            close: 'animated bounceOutLeft', // Animate.css class names
            easing: 'swing', // unavailable - no need
            speed: 500 // unavailable - no need
        }
    });
}

//Đăng nhập
$("#btn-signin-submit").click(function () {
    signinServer();
});

//Sign out khỏi hệ thống
$("#btn-signout").click(function() {
    $.get("api/sign/signout.php");
    signout();

    thongBao("<strong>Đăng xuất</strong><br>Đăng xuất thành công!", "success");
});

//Thay đổi trang thái sang đã đăng xuất
function signout() {
    var signinDOM = $("#signined");
    signinDOM.hide();
    signinDOM.attr("data-target", "out");
    $("#btn-signup").show();
    $("#btn-signin").show();
}

//Thay đổi trang thái sang đã đăng nhập
function signin() {
    $.ajax({
        url: "api/sign/getStatus.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
            if (data.status == true) {
                $("#hello-user").text(data.user);
                var signinDOM = $("#signined");
                signinDOM.show();
                signinDOM.attr("data-target", "in");
                $("#btn-signup").hide();
                $("#btn-signin").hide();
            }
        }
    });
}

//Get trạng thái đăng nhập
function getStatusSign() {
    var status = $("#signined").attr("data-target");
    return (status == "in");
}

//Chức năng lưa thời khóa biểu
$("#btn-save-table").click(function () {
    var sign = getStatusSign();
    if (!sign) {
        $("#form-signup").modal("show");
        return;
    }

    //Nếu đã đăng nhập thì xử lý theo tool
    thongBao("<strong>Đang phát triển</strong><br>Chức năng đang được hoàn thiện", "information");
});

//Chức năng share thời khóa biểu
$("#btn-share-table").click(function () {
    var sign = getStatusSign();
    if (!sign) {
        $("#form-signup").modal("show");
        return;
    }

    //Nếu đã đăng nhập thì xử lý theo tool
    thongBao("<strong>Đang phát triển</strong><br>Chức năng đang được hoàn thiện", "information");
});

//Chức năng export ra file
$("#btn-export-table").click(function () {
    var sign = getStatusSign();
    if (!sign) {
        $("#form-signup").modal("show");
        return;
    }

    //Nếu đã đăng nhập thì xử lý theo tool
    thongBao("<strong>Đang phát triển</strong><br>Chức năng đang được hoàn thiện", "information");
});

//Chức năng sửa thông tin cá nhân
$("#btn-edit-profile").click(function() {
    thongBao("<strong>Đang phát triển</strong><br>Chức năng đang được hoàn thiện", "information");
});

//Ấn Enter trực tiếp sau khi gõ xong không cần nhấn nút Đăng nhập
$('#inputPassword').keypress(function (e) {
    if (e.which == 13) {
        signinServer();
        return false;
    }
});
$('#inputEmail').keypress(function (e) {
    if (e.which == 13) {
        signinServer();
        return false;
    }
});

//Sign in vào server
function signinServer() {
    var user = $("#inputEmail").val();
    var pass = $("#inputPassword").val();

    $.ajax({
        url     : "api/sign/signin.php",
        method  : "POST",
        dataType: "json",
        data    : {user: user, pass: pass},
        success : function(data) {
            if (data.result == true) {
                $("#form-signin").modal("hide");
                signin();
                thongBao("<strong>Đăng nhập</strong><br>Đăng nhập thành công!", "success");
            } else {
                thongBao("<strong>Đăng nhập</strong><br>Đăng nhập thất bại!", "error");
            }
        }
    });
}

function signupServer() {
    var user = $("#inputEmail-up").val();
    var pass = $("#inputPassword-up").val();

    $.ajax({
        url     : "api/sign/signup.php",
        method  : "POST",
        dataType: "json",
        data    : {user: user, pass: pass},
        success : function(data) {
            if (data.result == true) {
                $("#form-signup").modal("hide");
                thongBao("<strong>Đăng ký</strong><br>Bạn đã đăng ký thành công!", "success");
            } else {
                thongBao("<strong>Đăng ký</strong><br>Đăng ký thất bại! Vui lòng thử lại!", "error");
            }
        }
    });
}

$('.form-signup').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        e.preventDefault();
        signupServer();
    }
});