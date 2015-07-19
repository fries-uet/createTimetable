@extends ('layouts.master')

@section ('head.title')
<title>Create Timetable</title>
@stop

@section ('body.content')
<div class="jumbotron">
	<div class="container">
		<h1>Hello, world!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt ipsam quasi delectus nam et officia dolorem, odit sapiente doloremque, consequuntur numquam, laboriosam esse veritatis neque! Ipsa deleniti soluta quae?</p>
		<p>
			<a href="{{ route('main.home') }}" class="btn btn-primary btn-lg">Learn more</a>
		</p>
	</div>
</div>

@include ('partials.signin')
@include ('partials.signup')
@stop