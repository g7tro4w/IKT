<?php
session_start();
if (!$_SESSION['trueAnswer']) {
    $_SESSION['trueAnswer'] = 0;
}
if (!$_SESSION['falseAnswer']) {
    $_SESSION['falseAnswer'] = 0;
} ?>
<!DOCTYPE HTML> <!--TODO fix1-->
<html>
<head>
    <title>Тестирование</title> <!--TODO fix2-->
    <meta charset="utf-8">

    <!--CEO-->

    <link href="../css/reset.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <!-- <script src="jquery-2.1.4.min.js"></script>-->
    <!--<script src="index.js"></script>-->
</head>
<body>
<?php include("../blocks/header.php"); ?>
<?php include("../blocks/nav.php"); ?>
<div id="core">
    <?php include("../blocks/leftMenu.php"); ?>
    <main>
        <?php
        //TODO fix8
        include("../mySQL/answers.php"); //Выводим задание на сайт
        ?>

        <form method="post"> <!--TODO fix7-->

            <div id='task'>
                <p>
                    <?php echo $task; ?>
                </p>
            </div>
            <ul>
                <li id='name_1'><input type='radio' name='radiobutton' value='1'><?php echo $row[0]; ?></li>
                <li id='name_2'><input type='radio' name='radiobutton' value='2'><?php echo $row[1]; ?></li>
                <li id='name_3'><input type='radio' name='radiobutton' value='3'><?php echo $row[2]; ?></li>
                <li id='name_4'><input type='radio' name='radiobutton' value='4'><?php echo $row[3]; ?></li>
            </ul>


            <input type="submit" value="Подтвердить">
        </form>

        <?php
        if (isset($_POST['radiobutton'])) {
            if ($_POST['radiobutton'] == $trueAnswer) {
                echo('Вы выбрали правильный ответ');

                $_SESSION['trueAnswer']++;
            } else {
                echo('Вы выбрали неправильный ответ - ' . $_POST['radiobutton'] . ', в то время как правильный - ' . $trueAnswer);
                $_SESSION['falseAnswer']++;
            }
        } else {
            echo('Произошла ошибка - переключатель не работает!');
        }
        ?>
        <hr>

        <p>

        <p>
            Правильных ответов - <?php echo $_SESSION['trueAnswer']; ?>
        </p>

        <p>
            Неправильных ответов - <?php echo $_SESSION['falseAnswer']; ?>
        </p>

        <p>
            Задание выполняет пользователь <?php echo $_SESSION['User']; ?>
        </p>
    </main>

    <?php include("../blocks/rightMenu.php"); ?>
</div>
<?php include("../blocks/footer.php"); ?>
</body>
</html>