<?php
$db_server = mysql_connect('localhost', 'root', '');
if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
mysql_select_db('iktTasks')
or die("Невозможно выбрать базу данных: " . mysql_error());
mysql_query('SET names "utf-8"');
$csv_open = fopen("../temp.csv", "r");
$r = 0;
$columns = "`Task`,`name1`,`name2`,`name3`,`name4`";
while (($data = fgetcsv($csv_open, 1000, ";")) != FALSE) {
    $r++;
    if ($r == 1) {
        continue;
    } // -1 stroka

    $insertValues = array();
    foreach ($data as $v) {
        $insertValues[] = "'" . addslashes(trim($v)) . "'";
    }
    $values = implode(',', $insertValues);
    $sql = "INSERT INTO Tests ($columns) VALUES ($values)";
    mysql_query($sql) or die("SQL ERROR:" . mysql_error());
}
echo "Подкулючение к базе данных и загрузка в нее информации успешно завершено!";
fclose($csv_open);
?>