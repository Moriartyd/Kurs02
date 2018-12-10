<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Отправление</title>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/table.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
    </head>
    <body>
        <?php
            include_once "helphp/nav.php";
        ?>
        <table class="ttable" border="10" cellpadding = "10" align="center">
                <tr>
                    <th>№ Поезда</th>
                    <th>Станция отправления</th>
                    <th>Станция назначения</th>
                    <th>Время отправления</th>
                </tr>

                <?php
                    include_once("helphp/connection.php");
                    $link = mysqli_connect($host, $user, $pas, $database)
                    or die("Ошибка" . mysql_error($link));
                    $i = 0;
                    $qcount = "SELECT COUNT(*) FROM outcome";
                    $result = mysqli_query($link, $qcount) or die("" . mysqli_error($link));
                    $n = mysqli_fetch_assoc($result);
                    $querry = "SELECT * FROM `outcome` ORDER BY 2 LIMIT 1 OFFSET $i";
                    $result = mysqli_query($link, $q) or die("" . mysqli_error($link));
                    $result = mysqli_query($link, $querry) or die("" . mysqli_error($link));
                    $str = mysqli_fetch_assoc($result);
                    while ($i < $n['COUNT(*)'])
                    {
                        $querry = "SELECT * FROM `outcome` ORDER BY 'time' LIMIT 1 OFFSET $i";
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
                ?>
            </table>
            <?php
                $querry = "SELECT * FROM users WHERE login LIKE '$name'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                if ($row['status'] == '1')
                echo "
                <form method=\"post\"> <div style=\"text-align:center; margin-top: 5%;\" class=\"button\">
                        <input type=\"submit\" name=\"eb\" value=\"Редактировать\">
                    </div> </form>";
                    if (isset($_POST['eb']))
                        header("Location: outedit.php");
            ?>
    </body>
</html>