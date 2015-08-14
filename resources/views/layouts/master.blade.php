<!DOCTYPE html>

<html lang="vi-VN">
<head>
    <meta charset="UTF-8">
    @yield('head.title')
    <link rel="icon" href="{{ url() }}/assets/images/favicon.ico" type="image/x-icon"/>

    <!-- Import CSS -->
    <link rel="stylesheet" href="{{ url() }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url() }}/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url() }}/assets/css/tooltipster.css">
    <link rel="stylesheet" href="{{ url() }}/assets/css/tooltipster-light.css">
    <link rel="stylesheet" href="{{ url() }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url() }}/assets/css/main.css">

    @yield('head.css')
</head>
<body>
<div id="page">    
    @include('partials.navbar')
    @include('partials.slide_guide')
    
    @yield('body.content')
</div>


<script src="{{ url() }}/assets/js/jquery.min.js"></script>
<script src="{{ url() }}/assets/js/bootstrap.min.js"></script>
<script src="{{ url() }}/assets/js/jquery.tooltipster.min.js"></script>
<script src="{{ url() }}/assets/js/jquery.noty.packaged.min.js"></script>
<script src="{{ url() }}/assets/js/validator.js"></script>
<script src="{{ url() }}/assets/js/sign.js"></script>
<script src="{{ url() }}/assets/js/main.js"></script>
<script src="{{ url() }}/assets/js/tool.js"></script>
@yield('body.js')

</body>
</html>