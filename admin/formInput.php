<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Nhập Môn Học UET - FRIES</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <script src="../js/jquery.min.js" type="text/javascript" ></script>
    <script src="../js/form.js" type="text/javascript"></script>
</head>
<body>
    <div class=""  style="">
        <!-- Lấy header -->
        <?php include("../includes/header.php"); ?>
        
        <!-- Thân trang -->
        <div class="" style="margin-top: 80px; color: #66afe9">
            <header class="page-header " style="">
                <h1 class="text-center "><b>Nhập Môn Học </b></h1>
            </header>
        </div>

        <div class="container" >
            <!--Begin left table-->
            <div class="col-lg-4" style="margin-top: 10px; padding-left: 40px; width: 420px; float: left;">
                <form class="form-group" method="post" action="../backend/save1.php">
                    <p><label>Tên Môn Học: </label><input id="name" type="text" class="form-control" placeholder="Nhập Tên Môn Học" value="" name="tenMH"></p>
                    <p><label>Mã Môn Học: </label><input id="code" type="text" class="form-control" placeholder="Nhập Mã Môn Học" value="" name="maMH"></p>
                    <p><label>Giảng Viên: </label><input id="teacher" type="text" class="form-control" placeholder="Nhập Tên Giảng Viên" value="" name="giaoVien"></p>
                    <p><label>Địa Điểm: </label><input id="location" type="text" class="form-control" placeholder="Nhập Lớp và Giảng Đường" value="" name="giangDuong"></p>
                    <div class="form-inline">
                            <p><label class="">Số Tín: </label>
                                <select id="tinChi" class="" style="" name="soTin">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                </select>
                            </p>
                    </div>

                    <div class=""><label><input id="LThuyet" type="radio" name="optradio" onclick="HideGroup()">Lý Thuyết</label></div>
                    <div class=""><label><input id="THanh" type="radio" name="optradio" onclick="ShowGroup()">Thực Hành</label>
                        <label id="showGroup" class="form-inline" style="display: none">Nhóm:
                            <select id="group" class="" name="nhom">
                                <!--Nhom mặc định là 0- lớp lý thuyết.-->
                                <option>0</option>
                            </select>
                        </label>
                    </div><br>

                    <div class="form-inline">
                        <label>Thứ: </label>
                        <select id="day" class="" name="day">
                            <!--<option selected="selected"></option>-->
                            <option selected>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                        <label>Tiết: </label>
                        <select id="start" class="" name="start">
                            <!--<option selected="selected"></option>-->
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                        </select>
                        - <select id="end" class="" name="end">
                            <!--<option selected="selected"></option>-->
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                        </select><br><br>
                        <div>
                            <div class="text-left" style="color: #31b0d5; float: left;" id="success">
                                <b>xem kỹ thông tin trước khi bấm</b>
                            </div>
                            <div class="text-right" style="padding-left: 5px;">
                                <input type="reset" class="btn btn-primary pull-right" value="Clear" onclick="clearForm()">
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary pull-right" value="Done" >&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end left table-->

            <!-- danh sach cac mon hoc trong database -->
            <table style=" width: 700px; float: left; padding-left: 10px;" id="list">
                <tr> <td style="text-align: center; font-size: 24px; color: #269abc; width: 700px;">danh sach cac mon hoc </td></tr>
            </table>
            <!--  end danh sach cac mon hoc trong database -->

        </div>
        
        <div>
            <p class="col-lg-12 modal-footer" style="color: #269abc;">Copyright @Fries 2015</p>
        </div>
    </div>

</body>
</html>