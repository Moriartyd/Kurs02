<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="nav.css">
        <link rel="stylesheet" type="text/css" href="input.css">
        <link rel="stylesheet" type="text/css" href="texts.css">
    </head>
    <body>
        <?php
            if (isset($_COOKIE['login']))
                header("Location: logged_in.php");

            $name = "";
            $password = "";
            include_once("connection.php");
            $link = mysqli_connect($host, $user, "", $database)
                or die("Ошибка" . mysql_error($link));
            mysqli_query($link, $q) or die("" . mysqli_error($link));
            
            $f = 0;
            if (isset($_POST['reg']))
                header("Location: registration.php");
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                $querry = "SELECT * FROM users WHERE login LIKE '$name'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                if ($row['login'] == $name && $row['password'] == $password)
                {
                    header("Location: Try_kurs.php");
                    setcookie("login", $row['login']);
                    setcookie("status", $row['status']);
                }
                else
                    $f = 1;
            }
            include_once "nav.php"
        ?>
        
        <div class="container">
            <form method="post">
                <div style="text-align:center" class="name_box">
                    <input type="text" name="login" placeholder="Введите логин"> <br/>
                </div>

                <div style="text-align:center" class="pas_box">
                    <input type="password" name="pass" placeholder="Введите пароль"> <br/>
                </div>

                <?php
                    if ($f)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Неверный логин или пароль.</output><br/>
                    </div>";
                    }
                ?>

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Войти">
                </div>

                <div style="text-align:center; margin-top: -2%;" class="button">
                    <input type="submit" name="reg" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </body>
</html>