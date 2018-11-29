<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>
    <body>
        <nav>
                <a href="Try_Kurs.html">Главная</a>
                <!-- <a href="income.html">Прибытие</a>
                <a href="outcome.html">Отправление</a>
                <a href="search.html">Поиск</a>
                <a href="howto.html">Как добраться</a> -->
                <a id="log_in" href="log_in.html">Войти</a>
        </nav>
        <?php
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                echo $name;
            }
            ?>

        <form method="post">
            <input type="text" name="login">
            <input type="password" name="pass">
            <input type="submit" name="submit" value="Войти">
        </form>    
    </body>
</html>