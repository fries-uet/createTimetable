@extends('usercp.layouts.master')

@section('head.title')
<title>Bảng điểu khiển</title>
@stop

@section('body.page-header')
Bảng điều khiển
@stop

@section('body.page-content')
<h3>Danh sách thời khóa biểu</h3>
<div class="row">
    <div class="col-lg-12">
        <table id="list-timetable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Mã LMH</th>
                <th>Tiết</th>
                <th>Buổi</th>
                <th>Số tín</th>
                <th>Giảng viên</th>
                <th>Giảng đường</th>
                <th>Ghi chú</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Mã LMH</th>
                <th>Tiết</th>
                <th>Buổi</th>
                <th>Số tín</th>
                <th>Giảng viên</th>
                <th>Giảng đường</th>
                <th>Ghi chú</th>
            </tr>
            </tfoot>

            <tbody>
            <tr>
                <td colspan="5">1. Toán rời rạc</td>
                <td colspan="2">INT2202</td>
            </tr>
            <tr>
                <td title="Mã MH: INT2202">INT2202 2</td>
                <td>3-4</td>
                <td>Sáng</td>
                <td>3</td>
                <td>TS.Nguyễn Phương Hoài Nam, ThS. Nguyễn Thị Minh Hồng</td>
                <td>303 G2</td>
                <td>CL</td>
            </tr>
            <tr>
                <td>INT2202 2</td>
                <td>3-4</td>
                <td>Chiều</td>
                <td>3</td>
                <td>PGS.TS.Trương Ninh Thuận, TS.Võ Đình Hiếu</td>
                <td>303 G2</td>
                <td>CL</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@stop