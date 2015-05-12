<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jasmine Test Sign in</title>

    <link rel="shortcut icon" type="image/png" href="lib/jasmine-2.3.2/jasmine_favicon.png">
    <link rel="stylesheet" href="lib/jasmine-2.3.2/jasmine.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <script src="lib/jasmine-2.3.2/jasmine.js"></script>
    <script src="lib/jasmine-2.3.2/jasmine-html.js"></script>
    <script src="lib/jasmine-2.3.2/boot.js"></script>
    <script src="lib/mock-ajax.js"></script>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.tooltipster.min.js"></script>
    <script src="../js/jquery.noty.packaged.min.js"></script>
    <script src="../js/validator.js"></script>

</head>

<body>
<div style="display: none;">
    <?php include "../index.php"; ?>
</div>

<script src="src/sign.js"></script>
<script src="src/main.js"></script>
<script src="../js/tool.js"></script>

<!-- include spec files here... -->
<script src="spec/SpecSignin.js"></script>
</body>
</html>