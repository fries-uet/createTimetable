<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Nhập Môn Học UET - FRIES</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <script src="../js/form.js" type="text/javascript"></script>
</head>
<body>
    <div class=""  style="">
        <!-- Lấy header -->
        <?php include("../includes/header.php"); ?>
        
        <!-- Thân trang -->
        <div class="" style="margin-top: -40px">
            <header class="page-header " style="">
                <h1 class="text-center "><b>Nhập Môn Học </b></h1>
            </header>
        </div>

        <div class="container" >
            <!--Begin left table-->
            <div class="col-lg-4" style="margin-top: 60px">
                <form class="form-group">
                    <p><label>Tên Môn Học: </label><input id="name" type="text" class="form-control" placeholder="Nhập Tên Môn Học" value=""></p>
                    <p><label>Mã Môn Học: </label><input id="code" type="text" class="form-control" placeholder="Nhập Mã Môn Học" value=""></p>
                    <p><label>Giảng Viên: </label><input id="teacher" type="text" class="form-control" placeholder="Nhập Tên Giảng Viên" value=""></p>
                    <p><label>Địa Điểm: </label><input id="location" type="text" class="form-control" placeholder="Nhập Lớp và Giảng Đường" value=""></p>
                    <div class="form-inline">
                            <p><label class="">Số Tín: </label>
                                <select id="tinChi" class="" style="">
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
                            <select id="group" class="">
                                <!--Nhom mặc định là 0- lớp lý thuyết.-->
                                <option>0</option>
                            </select>
                        </label>
                    </div><br>

                    <div class="form-inline">
                        <label>Thứ: </label>
                        <select id="day" class="" >
                            <!--<option selected="selected"></option>-->
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                        <label>Tiết: </label>
                        <select id="start" class="">
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
                        - <select id="end" class="">
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
                        
                        <div class="text-right"><input type="button" class="btn btn-primary pull-right" value="Done" onclick="getData()"></div>
                    </div>
                </form>
            </div>
            <!--end left table-->

            <!--Begin Right table-->
            <div class="col-sm-6">
                <div class="title-subject text-center bg-primary btn-sm" ><h4><b>Môn học</b></h4></div>
                <!--Begin list Subject-->
                <div class="list-subject  table-bordered btn-sm" style="overflow-y: scroll; height: 450px;">
                    <table class="table table-striped table-hover table-bordered  bg-info">
                        <tbody id="leftTable">
                        <!--<script> printRightTable();</script>-->
                        </tbody>
                    </table>
                </div>
                <!--End list Subject-->
            </div>
            <!--End right table-->
        </div>
        
        <div>
            <p class="col-lg-12 modal-footer">Copyright @Fries 2015</p>
        </div>
    </div>

</body>
</html>