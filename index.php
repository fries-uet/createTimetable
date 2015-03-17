<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Project Create Timetable UET - Fries</title>
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>
        #btnAddSubject {
            width: 100%;
            margin-bottom: 11px;
        }
    </style>
</head>
<body>
<div>
    <header class="page-header ">
        <h1 class="text-center">Create Timetable UET - Fries</h1>
    </header>
    <div style="margin-top: 20px">
        <!--Begin Left-->
        <div class="col-lg-3">
            <div class="text-center">
                <h3>Lớp môn học</h3>
                <button class="btn btn-success" id="btnAddSubject">Thêm</button>
            </div>

            <!--Begin list Subject-->
            <div style="overflow-y: scroll; height: 450px;">
                <table class="table table-striped table-hover">
                    <tbody id="listLesson"><!-- Chứa danh sách các lớp môn học -->
                    </tbody>
                </table>
            </div>
            <!--End list Subject-->
        </div>
        <!--End Left-->

        <!--Begin Right-->
        <div class="col-lg-9">
            <div>
                <div id="info-numberSuject">Tổng số môn: <span id="numberSubject">0</span></div><h3>Thời khóa biểu</h3>
            </div>
            <table class="table table-bordered table-hover text-center">
                <thead class="bg-primary">
                <tr>
                    <th class="text-center col-lg-1">Tiết/Thứ</th>
                    <th class="text-center col-lg-2">2</th>
                    <th class="text-center col-lg-2">3</th>
                    <th class="text-center col-lg-2">4</th>
                    <th class="text-center col-lg-2">5</th>
                    <th class="text-center col-lg-2">6</th>
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
                        <td colspan="6" title="11h50' - 13h" class="bg-info">Nghỉ trưa</td>
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
        <!--End Left-->
    </div>
    <div class="col-lg-12 modal-footer">
        <p>Copyright @Fries 2015</p>
    </div>
</div>

<!--Add SlideBar-->
<div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <table class="table">
            <thead>
                <tr><td>Danh sách môn học</td></tr>
            </thead>
            <tbody id="listSubject">
            </tbody>
        </table>
    </div>
</div>
<!-- /#wrapper -->


<!-- Javascript -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>