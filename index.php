<!DOCTYPE html>

<html lang="vi-VN">
<head>
    <meta charset="UTF-8">
    <title>Create Timetable UET - Fries</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/sidebar.css" type="text/css"/>
    <link rel="stylesheet" href="css/tooltipster.css" />
    <link rel="stylesheet" href="css/tooltipster-light.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.tooltipster.min.js"></script>
</head>
<body>
    <div id="page" style="padding-top: 55px">

        <!--Lấy header-->
        <?php include("includes/header.php"); ?>

        <!--Phần thân của Thời khóa biểu-->
        <div id="content">
            <!--Phần danh sách môn học(ở bên trái)-->
            <div id="content-left" class="col-lg-3">
                <div id="content-left-header" class="text-center">
                    <h3>Môn học</h3>
                    <button class="btn btn-block btn-success" id="btnAddSubject">Thêm</button>
                </div>
                <div id="content-left-listSubject" style="overflow-y: scroll; height: 450px">
                    <ul id="list-lesson" class="list-group">
                    </ul>

                </div>
            </div>

            <!--Phần bảng thời khóa biểu-->
            <div id="content-right" class="col-lg-9">
                <div>
                    <h3 class="pull-left">
                        Thời khóa biểu
                    </h3>
                    <div class="pull-right" style="padding-top: 25px; padding-left: 20px">
                        Tổng số môn:
                        <div id="soMon" class="pull-right" style="color: red; padding-left: 10px">0</div>
                    </div>
                    <div class="pull-right" style="padding-top: 25px">
                        Tổng số tín:
                        <div id="soTin" class="pull-right" style="color: red; padding-left: 10px">0</div>
                    </div>
                </div>
                <table id="content-right-table" class="table table-bordered table-hover text-center">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center col-lg-1">Tiết \Thứ</th>
                            <th class="text-center col-lg-2">Hai</th>
                            <th class="text-center col-lg-2">Ba</th>
                            <th class="text-center col-lg-2">Tư</th>
                            <th class="text-center col-lg-2">Năm</th>
                            <th class="text-center col-lg-2">Sáu</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTable"><!-- Bảng thời khóa biểu tuần -->
                        <tr id="lesson-1">
                            <td title="7h - 7h50'">1</td>
                            <td id="location-1"></td>
                            <td id="location-11"></td>
                            <td id="location-21"></td>
                            <td id="location-31"></td>
                            <td id="location-41"></td>
                        </tr>
                        <tr id="lesson-2">
                            <td title="8h - 8h50'">2</td>
                            <td id="location-2"></td>
                            <td id="location-12"></td>
                            <td id="location-22"></td>
                            <td id="location-32"></td>
                            <td id="location-42"></td>
                        </tr>
                        <tr id="lesson-3">
                            <td title="9h - 9h50'">3</td>
                            <td id="location-3"></td>
                            <td id="location-13"></td>
                            <td id="location-23"></td>
                            <td id="location-33"></td>
                            <td id="location-43"></td>
                        </tr>
                        <tr id="lesson-4">
                            <td title="10h - 10h50'">4</td>
                            <td id="location-4"></td>
                            <td id="location-14"></td>
                            <td id="location-24"></td>
                            <td id="location-34"></td>
                            <td id="location-44"></td>
                        </tr>
                        <tr id="lesson-5">
                            <td title="11h - 11h50'">5</td>
                            <td id="location-5"></td>
                            <td id="location-15"></td>
                            <td id="location-25"></td>
                            <td id="location-35"></td>
                            <td id="location-45"></td>
                        </tr>
                        <tr>
                            <td colspan="6" title="11h50' - 13h" class="bg-info">Đi ăn cơm với gấu</td>
                        </tr>
                        <tr id="lesson-6">
                            <td title="13h - 13h50'">6</td>
                            <td id="location-6"></td>
                            <td id="location-16"></td>
                            <td id="location-26"></td>
                            <td id="location-36"></td>
                            <td id="location-46"></td>
                        </tr>
                        <tr id="lesson-7">
                            <td title="14h - 14h50'">7</td>
                            <td id="location-7"></td>
                            <td id="location-17"></td>
                            <td id="location-27"></td>
                            <td id="location-37"></td>
                            <td id="location-47"></td>
                        </tr>
                        <tr id="lesson-8">
                            <td title="15h - 15h50'">8</td>
                            <td id="location-8"></td>
                            <td id="location-18"></td>
                            <td id="location-28"></td>
                            <td id="location-38"></td>
                            <td id="location-48"></td>
                        </tr>
                        <tr id="lesson-9">
                            <td title="16h - 16h50'">9</td>
                            <td id="location-9"></td>
                            <td id="location-19"></td>
                            <td id="location-29"></td>
                            <td id="location-39"></td>
                            <td id="location-49"></td>
                        </tr>
                        <tr id="lesson-10">
                            <td title="17h - 17h50'">10</td>
                            <td id="location-10"></td>
                            <td id="location-20"></td>
                            <td id="location-30"></td>
                            <td id="location-40"></td>
                            <td id="location-50"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="wrapper">
            <div id="bg-sidebar" class="bg-sidebar"></div>
            <div id="sidebar-wrapper">
                <li class="list-group-item list-group-item-success"><h4>Danh sách môn học</h4></li>
                <ul class="list-group" id="list-subject">
                </ul>
            </div>
        </div>

        <!--Lấy footer-->
        <?php include("includes/footer.php"); ?>
    </div>
<script src="js/main.js"></script>
</body>
</html>