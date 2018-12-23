<?php
    //Удаление куки
    setcookie("login", "");
    //переадресация на главную страницу
    header("Location: main.php");
?>