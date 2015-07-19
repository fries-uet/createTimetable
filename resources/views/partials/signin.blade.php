<div class="modal fade" id="form-signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-signin" role="form" method="post" data-toggle="validator" data-post="{{ route('user.signin') }}">

                <input type="hidden" name="_tokenIn" value="{{ csrf_token() }}" id="_tokenIn">

                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Địa chỉ Email" required autofocus>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Mật khẩu</label>
                    <input type="password" name="password" data-minlength="6" id="inputPassword" class="form-control" placeholder="Mật khẩu" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="checkbox form-group">
                    <label>
                        <input type="checkbox" value="remember-me" checked> Nhớ tôi
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-signin-submit">Đăng nhập</button>
                </div>

                <div>
                    <label>Tôi chưa có tài khoản? <a href="#" id="btn-resignup">Đăng ký</a></label>
                </div>
            </form>

        </div>
    </div>
</div>