<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>
    <body>
        <?php
            include_once "nav.php";
            include_once "connection.php";
            $link = mysqli_connect($host, $user, "", $database)
            or die("Ошибка" . mysql_error($link));

            $f = 0;
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                $email = $_POST['email'];
                $phone_num = $_POST['phone_num'];
                if (mysqli_query($link, "INSERT INTO users (login, password, email, phone_num)
                                    VALUES ('$name','$password', '$email', '$phone_num')"))
                    header("Location: index.php");
                else
                    $f = 1;
            }
        ?>
        
        <div class="container">
            <form method="post">
                <div style="text-align:center" class="name_box">
                    <input type="text" name="login" placeholder="Придумайте логин*"> <br/>
                </div>

                <div style="text-align:center" class="pas_box">
                    <input type="password" name="pass" placeholder="Придумайте пароль*"> <br/>
                </div>

                <div style="text-align:center" class="num_box">
                    <input type="text" name="phone_num" placeholder="Введите номер телефона"> <br/>
                <!-- </div>

                <div style="text-align:center" class="num_box"> -->
                    <input type="text" name="email" placeholder="Введите Электронную почту"> <br/>
                </div>

                <?php
                    if ($f)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Пользователь с таким логином уже существует</output><br/>
                    </div>";
                    }
                ?>

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </body>
</html>