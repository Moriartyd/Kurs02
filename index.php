<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>
    <body>
        <?php
            $name = "";
            $password = "";
            include_once("connection.php");
            $link = mysqli_connect($host, $user, "", $database)
                or die("Ошибка" . mysql_error($link));
            
            $f = 0;
            setcookie("login", $name);
            if (isset($_POST['reg']))
                header("Location: registration.php");
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                $querry_login = "SELECT login FROM users WHERE login LIKE '$name'";
                $querry_pass = "SELECT password FROM users WHERE password LIKE '$password'";
                $name_db = mysqli_query($link, $querry_login) or die("Ошибка" . mysqli_error($link));
                $pass_db = mysqli_query($link, $querry_pass) or die("Ошибка" . mysqli_error($link));
                if ($name_db && $pass_db)
                {
                    echo "<h1>asdsad</h1>";
                    header("Location: Try_kurs.php");
                    setcookie("login", $name);
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