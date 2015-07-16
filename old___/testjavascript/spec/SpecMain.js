describe("Main App", function() {
    it("Get Background LMH", function() {
        var x = getBG(10);

        expect(x).toBe(0);
    });

    it("Get Background LMH - Thêm nhiều lớp môn học", function() {
        var x = getBG(10);
        var y = getBG(20);

        expect(y).toBe(2);
    });

    it("Get Background LMH - Thêm nhiều lớp môn học sau đó xóa đi 1 số lớp", function() {
        var x = getBG(10);
        var y = getBG(20);
        var z = getBG(17);
        var t = getBG(1);
        removeBG(20);
        var a = getBG(8);

        expect(2).toBe(a);
    });

    it("Get Background LMH - Thêm nhiều lớp môn học sau đó xóa đi lớp cuối vừa thêm", function() {
        var x = getBG(10);
        var y = getBG(20);
        var z = getBG(17);
        var t = getBG(1);
        removeBG(1);
        var a = getBG(8);

        expect(6).toBe(a);
    });

    it("Get Background LMH - Thêm nhiều lớp môn học sau đó xóa đi 1 lớp và thêm vào nhiều lớp", function() {
        var x = getBG(10);
        var y = getBG(20);
        var z = getBG(17);
        var t = getBG(1);
        removeBG(1);
        var a = getBG(8);
        var b = getBG(9);

        expect(10).toBe(a);
    });

    it("Remove VietNamese in Search Subject", function() {
        var name = bodauTiengViet("chỉ test thôi đ ê á");
        var eName = "chi test thoi d e a";

        expect(name).toEqual(eName);
    });

    it("Remove VietNamese in Search Subject - Không phân biệt chữ hoa chữ thường", function() {

        expect("tu tran").toEqual(bodauTiengViet("Tú Trần"));
        expect("tu tran van").toEqual(bodauTiengViet("TÚ TRần vĂn"));
    });
});