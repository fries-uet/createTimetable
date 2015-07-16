$('#form-update-info').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        updateProfile();
        //e.preventDefault();
    }
});

function updateProfile() {
    var email = $("#input-email").val();
    var name = $("#input-name").val();
    var pass = $("#input-pass").val();

    $.ajax({
        url: "../api/user/updateInfo.php",
        method: "POST",
        dataType: "json",
        data: {email: email, name: name, pass: pass},
        success: function(data) {
        }
    });
}