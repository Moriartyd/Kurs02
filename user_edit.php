<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Редактирование прав пользователей</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
        <link rel="stylesheet" type="text/css" href="styles/table.css">
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
                        echo "<script>
                                alert( 'Права пользователя успешно изменены' );
                                </script>";
                    } else
                        echo "<div style=\"text-align:left;\" class=\"error_msg\">
                                    <output>Вы ничего не изменили</output><br/>
                                </div>";
                } else
                    echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Данного пользователя не существует</output><br/>
                    </div>";
            }

        //Обработка нажатия кнопки "удалить пользователя"
        if (isset($_POST['user_del'])) {
            include_once("helphp/connection.php");
            $login = $_POST['login'];
            $querry = "SELECT * FROM users WHERE `login` LIKE '$login'";
            $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
            //Проверка на наличие пользователя в базе данных
            if (mysqli_num_rows($result) > 0) {
                $query = "DELETE FROM `users` WHERE `users`.`login` LIKE '$login'";
                mysqli_query($link, $query) or die("" . mysqli_error($link));
                echo "<script>
                                alert( 'Пользователь удален из системы' );
                                </script>";
            } else
                echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Данного пользователя не существует</output><br/>
                    </div>";
        }
        ?>
            <div style="text-align:center; margin-top: 20px;">
                <input type="radio" name="admin" value="1">
                <a>Разрешить редактирование расписания</a><br/>
            </div>

            <div style="text-align:center; margin-top: 20px;">
                <input type="radio" name="admin" value="0"> <a>НЕ разрешать редактирование расписания</a><br/>
            </div>

            <div style="text-align:center; margin-top: 5%;" class="cen">
                <input type="submit" name="submit" value="Внести изменения">
            </div>

            <div style="text-align:center; margin-top: -4%;" class="cen">
                <input type="submit" name="user_del" value="Удалить пользователя">
            </div>

            <div style="text-align:center; margin-top: -4%;" class="cen">
                <input type="submit" name="user_info" value="Показать информацию о пользователе">
            </div>
        </form>
    </div>

    <?php
    //Обработка кнопки "Показать информацию о пользователе"
    if (isset($_POST['user_info']))
    {
        include_once("helphp/connection.php");
        $login = $_POST['login'];
        $query = "SELECT * FROM users WHERE `login` LIKE '$login'";
        $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='ttable' border='10' cellpadding = '10' align='center' >
                        <tr>
                            <th>Логин</th>
                            <th>E-mail</th>
                            <th>Номер телефона</th>
                            <th>Может редактировать расписание</th>
                            <th>Количество посещений</th>
                        </tr>";
            $row = mysqli_fetch_assoc($result);
            $str = $row['login'];
            echo "<tr> <th>$str</th>";
            $str = $row['email'];
            echo "<th>$str</th>";
            $str = $row['phone_num'];
            echo "<th>$str</th>";
            if ($row['status'] == 1)
                echo "<th>Да</th>";
            else
                echo "<th>Нет</th>";
            $bonus = $row['bonus'];
            echo "<th>$bonus</th> </tr>";
        } else
            echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Данного пользователя не существует</output><br/>
                    </div>";
    }
    ?>

    </body>
</html>