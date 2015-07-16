describe("Sign out", function() {
    beforeEach(function() {
        $.get("../../api/sign/destroySession.php");
        signout();
    });
    it("Show Sign up", function() {
        var displaySignup = $("#btn-signup").attr("style");
        var eDisplaySignup = "";

        expect(displaySignup).toBe(eDisplaySignup);
    });

    it("Show Sign in", function() {
        var displaySignin = $("#btn-signin").attr("style");
        var eDisplaySignin = "";

        expect(displaySignin).toBe(eDisplaySignin);
    });

    it("Hide Hello User", function() {
        var displayHello = $("#signined").css("display");
        var eDisplayHello = "none";

        expect(displayHello).toBe(eDisplayHello);
    });

    it("Data-target should be out", function() {
        var dataOut = $("#signined").attr("data-target");
        var eDataOut = "out";

        expect(dataOut).toBe(eDataOut);
    })

});

describe("Get API status sign", function() {
    beforeEach(function() {
        jasmine.Ajax.install();
        $.get("../../api/sign/destroySession.php");
        signout();
    });
    afterEach(function() {
        jasmine.Ajax.uninstall();
    });

    it("Status Sign in should be False", function() {
        spyOn($, "ajax").and.callFake(function(options) {
            options.success();
        });
        var callback = jasmine.createSpy();
        getStatus(callback);

        expect(callback).toHaveBeenCalled();
    });
});

function getStatus(callback) {
    $.ajax({
        url: "../api/sign/getStatus.php",
        method: "GET",
        dataType: "json",
        success: callback
    });
}

