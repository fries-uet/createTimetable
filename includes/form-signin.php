<div class="modal fade" id="form-signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-signin" role="form" method="post" data-toggle="validator">
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Mật khẩu</label>
                    <input type="password" name="password" data-minlength="6" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="checkbox form-group">
                    <label>
                        <input type="checkbox" value="remember-me"> Nhớ tôi
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn-signin-submit">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>