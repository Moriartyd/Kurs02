<?php
    //Соединение с базой данных
    $host ='localhost';// 'a260286.mysql.mchost.ru';
    $database = 'mysite';//'a260286_1';
    $user = 'root';//'a260286_1';
    //$pas = 'Sb321w4A31X4';
    $q = "SET NAMES utf8";
	$link = mysqli_connect($host, $user, "", $database)
                or die("Ошибка" . mysqli_error($link));
	mysqli_query($link, $q) or die("" . mysqli_error($link));
?>