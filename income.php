<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Прибытие</title>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/table.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
    </head>
    <body>
            <?php
                include_once "helphp/nav.php";
            ?>
            <form method="post">
            <table class="ttable" border="0" cellpadding = "1" align="center">
                <tr>
                    <th>
                        <div style="text-align:center; margin-top: 5%;" class="pas_box" >
                            <input type="radio" name="time"  value="inB"> <a>Вчера</a>
                        </div>
                    </th>
                    <th>
                        <div style="text-align:center; margin-top: 5%;" class="pas_box" >
                            <input type="radio" name="time"  value="income"> <a>Сегодня</a>
                        </div>
                    </th>
                    <th>
                        <div style="text-align:center; margin-top: 5%;" class="pas_box" >
                            <input type="radio" name="time"  value="inA"> <a>Завтра</a>
                        </div>
                    </th>
                </tr>
            </table>
            <div style="text-align:center;">
                    <input type="submit" name="submit" value="Показать расписание">
            </div>
            </form>

                <?php
                    include_once("helphp/connection.php");
                    $i = 0;
                    if (isset($_POST['time']))
                    {
                        echo "<table class=\"ttable\" border=\"10\" cellpadding = \"10\" align=\"center\">
                        <tr>
                            <th>№ Поезда</th>
                            <th>Станция отправления</th>
                            <th>Станция назначения</th>
                            <th>Время прибытия</th>
                        </tr>";
                        $connect = $_POST['time'];
                        $qcount = "SELECT COUNT(*) FROM $connect";
                        $result = mysqli_query($link, $qcount) or die("" . mysqli_error($link));
                        $n = mysqli_fetch_assoc($result);
                        $querry = "SELECT * FROM $connect ORDER BY 1 LIMIT 1 OFFSET $i";
                        $result = mysqli_query($link, $querry) or die("" . mysqli_error($link));
                        $str = mysqli_fetch_assoc($result);
                        while ($i < $n['COUNT(*)'])
                        {
                            $querry = "SELECT * FROM $connect ORDER BY 'time' LIMIT 1 OFFSET $i";
                            $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                            $str = mysqli_fetch_assoc($result);
                            $tmp = $str['id'];
                            echo "<tr> <th>$tmp</th>";
                            $s = $str['departure'];
                            echo "<th>$s</th>";
                            $s = $str['destination'];
                            echo "<th>$s</th>";
                            $tmp = $str['time'];
                            echo "<th>$tmp</th> </td>";
                            $i++;
                        }
                    }
                ?>
            </table>
            <?php
                include_once("helphp/connection.php");
                $login =  $_COOKIE['login'];
                $querry = "SELECT * FROM users WHERE `login` LIKE '$login'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                echo $row['status'];
                if ($row['status'] == 1)
                {
                    echo "
                    <form method=\"post\"> <div style=\"text-align:center; margin-top: -1%;\" class=\"button\">
                            <input type=\"submit\" name=\"eb\" value=\"Редактировать\">
                        </div> </form>";
                        if (isset($_POST['eb']))
                            header("Location: inedit.php");
                }
            ?>
            <h1>
            <?php
                include_once("helphp/connection.php");
                $querry = 'SELECT * FROM users WHERE login LIKE "$_COOKIE[\'name\']"';
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                echo $row['status'];
                ?>
            </h1>
    </body>
</html>