@extends('usercp.layouts.master')


@section('head.title')
<title>Thiết lập cá nhân</title>
@stop

@section('body.page-header')
Thiết lập cá nhân
@stop

@section('body.page-content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form role="form" data-toggle="validator" method="post" id="form-update-info">
            <label class="h3">Tên</label>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input id="iput-email" type="text" class="form-control" placeholder="Email" disabled value="{{ $user->email }}">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="input-name" type="text" class="form-control" placeholder="Họ và tên" value="{{ $user->name }}">
            </div>

            <label class="h3">Thay đổi mật khẩu</label>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-pass-current" name="input-pass-current" type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu hiện tại">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-pass" name="input-pass" type="password" data-minlength="6" class="form-control" placeholder="Mật khẩu mới">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="input-repass" name="input-repass" type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" data-match="#input-pass" data-match-error="Mật khẩu không trùng khớp">
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-update-submit">Cập nhật</button>
            </div>
        </form>

    </div>
</div>
@stop