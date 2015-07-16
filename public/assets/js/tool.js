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