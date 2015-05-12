describe("Sign in", function() {
    beforeEach(function() {
        //Thoát ra hẳn
        //$.get("../../api/sign/destroySession.php");
        //signout();

        //Đăng nhập
        var user = "test@gmail.com";
        var pass = "123456";
        $.ajax({
            url: "../api/sign/signin.php",
            method: "POST",
            dataType: "json",
            data: {user: user, pass: pass},
            success: function(data) {

            }
        });

        signin();
    });

    it("Button Hello User should be appear", function() {
        var x = $("#signined").attr("data-target");
        var eX = "out";

        expect(x).toBe(eX);
    });
});