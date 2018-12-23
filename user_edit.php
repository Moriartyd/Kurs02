<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Редактирование прав пользователей</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
    </head>
    <body>
    <?php
        include_once("helphp/nav.php");
    ?>
    <div class="container">
        <form method="post">
            <div style="text-align:center" class="name_box">
                <input type="text" name="login" placeholder="Введите логин пользователя"> <br/>
            </div>

        <?php
            if (isset($_POST['submit'])) {
                include_once("helphp/connection.php");
                $login = $_POST['login'];
                $querry = "SELECT * FROM users WHERE `login` LIKE '$login'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                //Проверка на наличие пользователя в базе данных
                if (mysqli_num_rows($result) > 0) {
                    //изменение статуса пользователя
                    $row = mysqli_fetch_assoc($result);
                    //проверка на заполнение изменений
                    if (isset($_POST['admin'])) {
                        $value = $_POST['admin'];
                        $querry = "UPDATE `users` SET `status` = '$value' WHERE `users`.`login` = '$login'";
                        mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                    } else
                        echo "<div style=\"text-align:left;\" class=\"error_msg\">
                                    <output>Вы ничего не изменили</output><br/>
                                </div>";
                } else
                    echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Данного пользователя не существует</output><br/>
                    </div>";
            }
        ?>
            <div style="text-align:center; margin-top: 20px;">
                <input type="radio" name="admin" value="1"> <a>Разрешить редактирование расписания</a><br/>
            </div>

            <div style="text-align:center; margin-top: 20px;">
                <input type="radio" name="admin" value="0"> <a>НЕ разрешать редактирование расписания</a><br/>
            </div>

            <div style="text-align:center; margin-top: 5%;" class="cen">
                <input type="submit" name="submit" value="Внести изменения">
            </div>
        </form>
    </div>

    </body>
</html>