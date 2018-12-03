<nav>
<?php
    if (isset($_COOKIE['login']))
    {
        echo "
            <a href=\"Try_Kurs.php\">Главная</a>
            <a href=\"income.php\">Прибытие</a>
            <a href=\"outcome.php\">Отправление</a>
            <a href=\"search.php\">Поиск</a>
            <a href=\"howto.php\">Как добраться</a>
            <a href=\"index.php\" id=\"login\">$_COOKIE[login]</a>";
    }
    else
    {
        echo "
            <a href=\"Try_Kurs.php\">Главная</a>
            <a id=\"log_in\" href=\"index.php\">Войти</a>";
    }
?>
</nav>