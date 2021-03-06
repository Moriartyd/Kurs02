<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Войти</title>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
    </head>
    <body>
        <?php
            //Проверка на вход
            //Если пользователь уже вошел, то происходит переадресация
            if (isset($_COOKIE['login']))
                header("Location: logged_in.php");

            $name = "";
            $password = "";
            include_once("helphp/connection.php");
            
            $f = 0;
            //Обработка нажатия кнопки регистрация
            if (isset($_POST['reg']))
                header("Location: registration.php");

            //Обработка нажатия кнопки войти
            if (isset($_POST['submit']))
            {
                $name = $_POST['login'];
                $password = $_POST['pass'];
                //проверка введенных данных
                $password = md5($password);
                $querry = "SELECT * FROM users WHERE login LIKE '$name'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                if ($row['login'] == $name && $row['password'] == $password)
                {
                    //Если пользователь обладает правами редактировать расписание
                    //То отключаем ему бонусную систему
                    if ($row['status'] != 1) {
                        $bonus = $row['bonus'] + 1;
                        setcookie("bonus", 1);
                        $querry = "UPDATE `users` SET `bonus` = '$bonus' WHERE `users`.`login` = '$name'";
                        mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                    }
                    header("Location: main.php");
                    //Установка данных пользователя через куки
                    setcookie("login", $row['login']);
                    if ($row['email'])
                        setcookie("email", $row['email']);
                    else
                        setcookie("email", " ");
                    
                    if ($row['phone_num'])
                        setcookie("phone", $row['phone_num']);
                    else
                        setcookie("phone", " ");
                }
                //Обработка ошибки при неверных данных
                else
                    $f = 1;
            }
            include_once "helphp/nav.php"
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