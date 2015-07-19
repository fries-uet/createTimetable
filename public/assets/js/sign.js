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

//Sign in vào server
function signinServer() {
    var email = $("#inputEmail").val();
    var pass = $("#inputPassword").val();
    var token = $("#_tokenIn").val();

    var url = $("form.form-signin").attr('data-post');

    $.ajax({
        url     : url,
        method  : "POST",
        dataType: "json",
        data    : {
            email : email,
            pass  : pass,
            _token: token
        },
        success : function(data) {
            if (data.result == true) {
                $("#form-signin").modal("hide");
                //signin();
                thongBao("<strong>Đăng nhập</strong><br>" + data.notify, "success");
                $(document).delay(1000);
                location.reload();
            } else {
                thongBao("<strong>Đăng nhập</strong><br>" + data.notify, "error");
                var temp = $("#form-signin");
                var x = temp.attr("class");
                temp.addClass("animated shake").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                    $(this).attr("class", x);
                });
            }
        }
    });
}

//Sign up vào server
function signupServer() {
    var user = $("#inputEmail-up").val();
    var pass = $("#inputPassword-up").val();
    var repass = $("#inputPasswordConfirm").val();
    var token = $("#_tokenUp").val();
    var url = $("form.form-signup").attr('data-post');

    $.ajax({
        url     : url,
        method  : "POST",
        dataType: "json",
        data    : {
            email: user,
            pass: pass,
            repass: repass,
            _token: token
        },
        success : function(data) {
            if (data.result == true) {
                $("#form-signup").modal("hide");
                thongBao("<strong>Đăng ký</strong><br>" + data.notify, "success");
            } else {
                thongBao("<strong>Đăng ký</strong><br>" + data.notify, "error");
                var temp = $("#form-signup");
                var x = temp.attr("class");
                temp.addClass("animated shake").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                    $(this).attr("class", x);
                });
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

$('.form-signin').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        e.preventDefault();
        signinServer();
    }
});

$("#btn-resignin").click(function(e) {
    e.preventDefault();
    $("#form-signup").modal("hide");
    $("#form-signin").modal("show");
});
$("#btn-resignup").click(function(e) {
    e.preventDefault();
    $("#form-signin").modal("hide");
    $("#form-signup").modal("show");
});