@extends ('layouts.master')

@section ('head.title')
<title>Create Timetable</title>
@endsection

@section ('body.content')
<div class="jumbotron">
	<div class="container">
		<h1>Create timetable</h1>
		<p>Phiên bản beta - Ứng dụng tạo thời khóa biểu cho sinh viên UET :]</p>
		<p>
			<a href="{{ route('main.home') }}" class="btn btn-primary btn-lg">Dùng thử</a>
		</p>
	</div>
</div>

@include ('partials.signin')
@include ('partials.signup')
@endsection