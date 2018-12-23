<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Личный кабинет</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
        <link rel="stylesheet" type="text/css" href="styles/frgments.css">
    </head>
    <body>
        <?php
        include_once("helphp/nav.php");
        ?>
        <table class="logtable" cellpadding="50" align="left" width="100%">
            <tr>
                <td><img src="resources/fbpic.jpg" height = 500px ></td>
                <td>
                    <div style="text-align:left; font-size: 60px;">
                        <output>Логин:</output>
                        <?php
                            echo $_COOKIE['login'];
                        ?>
                        <br/>
                    </div>

                    <div style="text-align:left; font-size: 60px; margin-top: 40px;">
                        <output>Email: </output>
                        <?php
                            echo $_COOKIE['email'];
                        ?>
                        <br/>
                    </div>

                    <div style="text-align:left; font-size: 60px; margin-top: 40px;">
                        <output>Номер телефона: </output>
                        <?php
                            echo $_COOKIE['phone'];
                        ?>
                        <br/>
                    </div>
                </td>
            </tr>
        </table>

        <form method="post">
            <div style="text-align:center; margin-top: 5%;" class="button">
               <input type="submit" name="submit" value="Удалить учетную запись">
            </div>

            <div style="text-align:center; margin-top: -1%;" class="button">
                <input type="submit" name="edit_pas" value="Изменить пароль">
            </div>
        </form>
            <?php
                //Подключение кнопки "редактировать пользователя" для особых пользователей
                include_once("helphp/connection.php");
                $login =  $_COOKIE['login'];
                $querry = "SELECT * FROM users WHERE `login` LIKE '$login'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                //Если статус пользователя совпадает с нужным, то показываем кнопку
                if ($row['admin'] == '1')
					echo "<form method=\"post\">
                            <div style=\"text-align:center; margin-top: -1%;\" class=\"button\">
                                <input type=\"submit\" name=\"user_edit\" value=\"Редактировать права пользователей\">
                            </div>
                          </form>";
                //Обработка нажаитя кнопок
                if (isset($_POST['user_edit']))
                    header("Location: user_edit.php");
                if (isset($_POST['edit_pas']))
                    header("Location: edit_pas.php");

                //Обработка нажатия кнопки "удалить пользователя"
                if (isset($_POST['submit']))
                {
                    $login = $_COOKIE['login'];
                    include_once("helphp/connection.php");

                    $query = "DELETE FROM `users` WHERE `users`.`login` LIKE '$login'";
                    mysqli_query($link, $query) or die("" . mysqli_error($link));
                    setcookie("login", "");
                    setcookie("status", "");
                    header("Location: main.php");
                }
            ?>
		</body>
</html>