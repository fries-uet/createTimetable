<html>
<head>
    <title>form đăng nhập môn học</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script src="../js/form.js" type="text/javascript"></script>
    <style>
        #header{
            color: #31b0d5;
            font-size: 30px;
            font-weight: bold;
        }
        #footer{
            padding-top: 80px;
            padding-left: 1300px;
            color: #31b0d5;
        }
        .text-center{
            text-align: center;
        }
        #form_nhap_MH{
            padding-top: 40px;
            padding-bottom: 30px;
            width: 500px;
            background-color: #5bc0de;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id = "header">
        <header class="page-header " style="">
            <?php include "../includes/header.php";?>
            <h1 class="text-center ">Nhập Môn Học </h1>
        </header>
    </div>
    <div id="form_nhap_MH" >
        <form name="frm" method="post" action="../backend/save1.php">
            <p>
                <label>Tên Môn Học: </label>
                <input id="name" type="text" class="form-control" placeholder="Nhập Tên Môn Học" name = "tenMH">
            </p>
            <p>
                <label>Mã Môn Học: </label>
                <input id="code" type="text" class="form-control" placeholder="Nhập Mã Môn Học" name = "maMH">
            </p>
            <p>
                <label>Giảng Viên: </label>
                <input id="teacher" type="text" class="form-control" placeholder="Nhập Tên Giảng Viên" name = "tenGV">
            </p>
            <p>
                <label>Số Tín: </label>
                <select id="tinChi" name="soT">
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                </select>
            </p>
            <label>
                <input id="LThuyet" type="radio" name="optradio" onclick="HideGroup()">Lý Thuyết
            </label>
            <label>
                <input id="THanh" type="radio" name="optradio" onclick="ShowGroup()">Thực Hành
            </label>

            <label>Thứ: </label>
            <select id="day" name = "thu" >
                <!--<option selected="selected"></option>-->
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
            </select>

            <label>Tiết: </label>
            <select id="start" name = "tietS">
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

            - <select id="end" name = "tietE">
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
            </select>

            <div style="text-align: center"><input type="submit" value="Done"></div>
        </form>
    </div>
    <div id = "footer">
        <?php include "../includes/footer.php";?>
    </div>
</body>
</html>