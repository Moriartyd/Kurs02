<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Р</title>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
    </head>
    <body>
        <?php
            include_once "helphp/nav.php";
            include_once "helphp/connection.php";

            $f1 = 0;
            $f2 = 0;
            $check = " ";
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                $email = $_POST['email'];
                $word = $_POST['word'];
                $stat = '0';
                if ($word == "qwerty")
                    $stat = '1';
                $phone_num = $_POST['phone_num'];

                if  (!$name || !$password)
                {
                    $f2 = 1;
                }
                else {
                    if (mysqli_query($link, "INSERT INTO users (login, password, email, phone_num, status)
                                    VALUES (\"$name\",\"$password\", \"$email\", \"$phone_num\", \"$stat\")"))
                        header("Location: index.php");
                    else
                        $f1 = 1; 
                }
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
                    if ($f1)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Пользователь с таким логином уже существует</output><br/>
                    </div>";
                    }

                    if ($f2)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Вы не заполнили обязательные поля</output><br/>
                    </div>";
                    }
                ?>

                <div style="text-align:center" class="pas_box">
                    <input type="password" name="word" placeholder="Кодовое слово для сотрудников"> <br/>
                </div>

                <!-- <div style="text-align:center; margin-top: 5%;" class="pas_box">
                    <input type="checkbox" name="check"> <a>Я здесь работаю</a>
                </div> -->

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </div>

            </form>
        </div>
    </body>
</html>