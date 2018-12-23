<nav class="dws-menu">
    <?php
    //Меню навигации
        if (isset($_COOKIE['login']))
        {
            echo "
            <ul>
                <li><a href=\"main.php\">Главная</a></li>
                <li><a href=\"income.php\">Прибытие</a></li>
                <li><a href=\"outcome.php\">Отправление</a></li>
                <li><a href=\"search.php\">Поиск</a></li>
                <li><a href=\"howto.php\">Как добраться</a></li>
                <li><a href=\"index.php\" id=\"login\">$_COOKIE[login]</a>
                    <ul>
                        <li> <a href=\"logout.php\">Выйти</a> </li>
                    </ul>
                </li>
            </ul>";
        }
        else
        {
            echo "
            <ul>
                <li><a href=\"main.php\">Главная</a></li>
                <li><a id=\"log_in\" href=\"index.php\">Войти</a>
                </li>
            </ul>";
        }
    ?>
</nav>