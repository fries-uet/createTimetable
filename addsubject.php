<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Add subject into Daatabase</title>
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <script src="js/subject_quytm.js" type="text/javascript"></script>
</head>
<body>
<?php include("header.php"); ?>
<div style="padding-top: 50px">
    <div class="col-sm-4">
        <form>
            <h3 align="center">Nhập môn học</h3>
            <label>Tên Môn Học: </label><input id="tenMH" type="text" class="form-control" placeholder="Nhập Tên Môn Học"><br>
            <label>Mã Môn Học:  </label><input id="maMH" type="text" class="form-control" placeholder="Nhập Mã Môn Học "><br>
            <label>Số tín chỉ: </label>
            <select id="soTin" class="form-inline glyphicon-text-width">
                <!--<option selected="selected"></option>-->
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select><br>
        </select>
            <br><br>
            <div class="text-right">
                <button type="button" class="btn btn-info" onclick="getSubject()">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-sm-6 table-bordered">
        <div class="title-subject text-center"><h3>Môn học</h3></div>
        <!--Begin list Subject-->
        <div class="list-subject" style="overflow-y: scroll; height: 450px;">
            <table class="table table-striped table-hover table-bordered">
                <thead align="" style="" class="bg-success">
                    <th class="text-center" width="30%">Mã môn học</th>
                    <th class="text-center" width="50%">Tên môn học</th>
                    <th class="text-center" width="20%">Số tín</th>
                </thead>
                <tbody id="printSub">
                <!--<script> printSub();</script>-->
                </tbody>
            </table>
        </div>
        <!--End list Subject-->
    </div>
</div>
</body>
</html>