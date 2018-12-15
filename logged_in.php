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
        </form>
            <?php
                if (isset($_POST['submit']))
                {
                    $login = $_COOKIE['login'];
                    include_once("helphp/connection.php");

                    $query = "DELETE FROM `users` WHERE `users`.`login` = $login";
                    mysqli_query($link, $query) or die("" . mysqli_error($link));
                    setcookie("login", "");
                    setcookie("status", "");
                    header("Location: main.php");
                }
            ?>
		</body>
</html>