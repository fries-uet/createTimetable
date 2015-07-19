<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ route('main.index') }}">Create Timetable</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			@if (session('status') === 'true')
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Công cụ <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Lưu lại</a></li>
                    <li><a href="#">Chia sẻ</a></li>
                    <li><a href="#">Xuất file</a></li>
                </ul>
            </li>
            @else
            <li><a href="{{ route('main.home') }}"><b>Dùng thử</b></a></li>
            @endif
		</ul>
		<ul class="nav navbar-nav navbar-right">
			
			<li><a href="#" data-target="#guide-user" data-toggle="modal"><i class="fa fa-smile-o fa-fw"></i> Trợ giúp</a></li>
			
			<!-- Khi đã đăng nhập -->
			@if (session('status') === 'true')
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <b class="username">{{ session('username') }}</b> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user fa-fw"></i> Cá nhân</a></li>
					<li class="divider"></li>
					<li><a href="{{ route('user.signout') }}"><i class="fa fa-sign-out fa-fw"></i> Thoát</a></li>
				</ul>
			</li>

			<!-- Khi chưa đăng nhập -->
			@else
            <li><a href="#" data-target="#form-signup" data-toggle="modal"><i class="fa fa-user-plus fa-fw"></i> Đăng ký</a></li>
            <li><a href="#" data-target="#form-signin" data-toggle="modal"><i class="fa fa-sign-in fa-fw"></i> Đăng nhập</a></li>

			@endif
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>