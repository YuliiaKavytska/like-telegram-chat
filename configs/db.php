<!-- Это файл для подключения к базе данных -->
<?php
//Создадим 3 переменных для подключения к БД
$server = "localhost";
$user = "root";
$password = "";
$dbname = "webchat";

$connect = mysqli_connect($server, $user, $password, $dbname); //Подключаемся к серверу
mysqli_set_charset($connect, "utf8"); //Изменение кодировки для русских слов

?>