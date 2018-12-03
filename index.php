<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>
    <body>
        <?php
            $checker = ["login" => "admin",
                        "password" => "admin"];
            $name = "";
            $f = 0;
            setcookie("login", $name);
            $password = "";
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                if ($checker['login'] == $name && $checker['password'] == $password)
                {
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
            </form>
        </div>
    </body>
</html>