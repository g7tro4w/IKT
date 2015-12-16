<?php
    $row_count = mysql_result(mysql_query("SELECT COUNT(*) FROM Tests"), 0); //Узнаем размер таблицы
    $query = '(SELECT * FROM Tests LIMIT ' . rand(0, $row_count) . ', 1)'; //Рандомим строку исходя из размера таблицы
    $rs = mysql_query($query); //Отправляем ответ на запрос
    $row = mysql_fetch_array($rs);
    $task = $row[0]; //Записываем текст задания в переменную
    unset($row[0]); //Удаляем текст задания из массива
    sort($row); //делаем массив нормальным
    $trueAnswer = $row[0]; //Записываем значение правильного ответа
    shuffle($row); //Перемешиваем ответы
?>