@extends('usercp.layouts.master')


@section('head.title')
<title>Thiết lập cá nhân</title>
@stop

@section('body.page-header')
Thiết lập cá nhân
@stop

@section('body.page-content')
@if (isset($setting[1]['result']) || $setting[1]['result'] != "")
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><i class="fa fa-check"></i></strong> Cập nhật thông tin thành công
        </div>

        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><i class="fa fa-times"></i></strong> Mật khẩu hiện tại không đúng
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form role="form" data-toggle="validator" method="post" id="form-update-info">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="h3">Tên</label>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ $setting[0]->email }}" readonly>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="name" name="name" type="text" class="form-control" placeholder="Họ và tên" value="{{ $setting[0]->name }}">
            </div>

            <label class="h3">Thay đổi mật khẩu</label>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-pass-current" name="pass-current" type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu hiện tại">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-pass" name="pass-new" type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu mới">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-repass" name="repass-new" type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" data-match="#input-pass" data-match-error="Mật khẩu không trùng khớp">
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-update-submit">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@stop