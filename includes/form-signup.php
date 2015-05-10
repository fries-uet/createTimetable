<div class="modal fade" id="form-signup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-signup" role="form" data-toggle="validator">
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" data-remote="api/validator/" id="inputEmail-up" class="form-control" placeholder="Địa chỉ Email" required autofocus>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="inputPassword-up" class="sr-only">Mật khẩu</label>
                    <input type="password" data-minlength="6" id="inputPassword-up" class="form-control" placeholder="Mật khẩu" required>
                    <span class="help-block">Tối thiểu 6 kí tự</span>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword-up" data-match-error="Mật khẩu không trùng khớp" placeholder="Xác nhận mật khẩu" required>
                    <div class="help-block with-errors"></div>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-signup-submit">Đăng ký</button>
            </form>
        </div>
    </div>
</div>