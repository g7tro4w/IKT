<?php
session_start();
if (!$_SESSION['User']) {
    $_SESSION['User'] = "Student";
} ?>
<!DOCTYPE HTML> <!--TODO fix1-->
<html>
<head>
    <title>Портал подготовки к ЕГЭ по информатике</title> <!--TODO fix2-->
    <meta charset="utf-8">

    <!--CEO-->

    <link href="css/reset.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <!-- <script src="jquery-2.1.4.min.js"></script>-->
    <!--<script src="index.js"></script>-->
</head>
<body>
<!--TODO fix3, fix5-->
<?php include("blocks/header.php");
include("blocks/nav.php"); ?>
<div id="core">
    <?php include("blocks/leftMenu.php"); ?>
    <main class="mainContent">
        <h1 class="mainHead">
            Welcome!
        </h1>
        <a class="button testButton" href="pages/test.php">
            Начать тестирование!
        </a>
    </main>
    <?php include("blocks/rightMenu.php"); ?>
</div>
<?php include("blocks/footer.php"); ?>
</body>
</html>
