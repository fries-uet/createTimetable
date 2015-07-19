<!DOCTYPE html>

<html lang="vi-VN">
<head>
    <meta charset="UTF-8">
    @yield('head.title')
    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/tooltipster.css">
    <link rel="stylesheet" href="/assets/css/tooltipster-light.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    @yield('head.css')
</head>
<body>
<div id="page">

    <!--Lấy header-->
    <?php// include "includes/header.php"; ?>
    
    @include('partials.navbar')
    @include('partials.slide_guide')
    
    @yield('body.content')
</div>


<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.tooltipster.min.js"></script>
<script src="/assets/js/jquery.noty.packaged.min.js"></script>
<script src="/assets/js/validator.js"></script>
<script src="/assets/js/sign.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/tool.js"></script>
@yield('body.js')

</body>
</html>