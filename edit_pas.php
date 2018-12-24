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
                    <input type="password" name="last_pas" placeholder="Введите старый пароль"> <br/>
                </div>

                <div style="text-align:center; margin-top: 20px;">
                    <input type="password" name="new_pas" placeholder="Введите новый пароль"> <br/>
                </div>

        <?php
            if (isset($_POST['submit']))
            {
                //Проверка на заполненность полей
                if ($_POST['last_pas'] && $_POST['new_pas'])
                {
                    include_once("helphp/connection.php");
                    $last_pas = $_POST['last_pas'];
                    $new_pas = $_POST['new_pas'];
                    $login = $_COOKIE['login'];
                    $querry = "SELECT * FROM users WHERE `login` LIKE '$login'";
                    $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                    $row = mysqli_fetch_assoc($result);
                    //Если старые пароли совпадают, то изменяем пароль
                    if ($row['password'] == md5($last_pas))
                    {
                        $new_pas = md5($new_pas);
                        $querry = "UPDATE `users` SET `password` = '$new_pas' WHERE `users`.`login` = '$login'";
                        mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                        echo "<script>
                                alert( 'Пароль успешно изменен' );
                                </script>";
                    }
                    //Обработка ошибки
                    else
                        echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Старый пароль введен неверно</output><br/>
                    </div>";
                }
                //Обработка ошибки
                else
                    echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Вы не заполнили все поля</output><br/>
                    </div>";
            }
        ?>
                <div style="text-align:center; margin-top: 5%;" class="cen">
                    <input type="submit" name="submit" value="Внести изменения">
                </div>
            </form>
        </div>

    </body>
</html>