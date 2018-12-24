<nav class="dws-menu">
    <?php
    //Меню навигации
    //Покахываем разные меню для вошедших и не вошедших в систему пользователей
        if (isset($_COOKIE['login']))
        {
            echo "<ul>";
            //Не показываем пункт меню, в котором мы находимся
            if ($_SERVER['REQUEST_URI'] != "/main.php")
                echo "<li><a href=\"main.php\">Главная</a></li>";
                echo "<li><a href=\"income.php\">Прибытие</a></li>";
                echo "<li><a href=\"outcome.php\">Отправление</a></li>";
            if ($_SERVER['REQUEST_URI'] != "/search.php")
                echo "<li><a href=\"search.php\">Поиск</a></li>";
            if ($_SERVER['REQUEST_URI'] != "/howto.php")
                echo "<li><a href=\"howto.php\">Как добраться</a></li>";
                echo"<li><a href=\"index.php\" id=\"login\">$_COOKIE[login]</a>";
            //Если мы находимся во вкладке logged_in.php, то не показываем подменю
            if ($_SERVER['REQUEST_URI'] == "/logged_in.php")
                echo "</li>
                        </ul>";
            else
                echo"
                    <ul>
                        <li> <a href=\"logout.php\">Выйти</a> </li>
                    </ul>
                </li>
            </ul>";
        }
        else
        {
            echo "<ul>";
            if ($_SERVER['REQUEST_URI'] != "/main.php")
                echo "<li><a href=\"main.php\">Главная</a></li>";
                echo "<li><a id=\"log_in\" href=\"index.php\">Войти</a>
                </li>
            </ul>";
        }
    ?>
</nav>