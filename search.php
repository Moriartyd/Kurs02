<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <meta charset="utf-8">
        <title>Поиск</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
    </head>

    <body>
        <?php
            include_once("helphp/nav.php");
        ?>
        <form method="post">
                <div style="text-align:center; margin-top:-80px;">
                    <input type="text" name="val" placeholder="Введите данные поезда"> <br/>
                </div>
                <table align="center">
                    <tr>
                <th><div style="text-align:center; margin-top: 5%;" class="pas_box" >
                    <input type="radio" name="rad"  value="income"> <a>Прибытие</a>
                </div></th>

                <th><div style="text-align:center; margin-top: 5%;" class="pas_box">
                    <input type="radio" name="rad" value="outcome"> <a>Отправление</a>
                </div></th>
                    </tr>
                </table>
                <div style="text-align:center;">
                    <input type="submit" name="submit" value="Поиск">
                </div>
            </form>

        <?php
            include_once("helphp/connection.php");

            $i = 0;
            $value = "";
            if (isset($_POST['submit']) && isset($_POST['rad']))
            {
                $connect = $_POST['rad'];
                echo "
                    <table class=\"ttable\" border=\"10\" cellpadding =\"10\" align=\"center\">
                        <tr>
                            <th>№ Поезда</th>
                            <th>Станция отправления</th>
                            <th>Станция назначения</th>
                            <th>Время прибытия</th>
                        </tr>";

                $value = $_POST['val'];
                    $query = "SELECT * FROM $connect WHERE id LIKE \"$value\" OR 
                        departure LIKE \"$value\" OR destination LIKE \"$value\" OR time LIKE \"$value\"
                            ORDER BY 'time' LIMIT 1 OFFSET $i";
                $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
                $str = mysqli_fetch_assoc($result);
                while ($str) 
                {
                    $query = "SELECT * FROM $connect WHERE id LIKE \"$value\" OR 
                        departure LIKE \"$value\" OR destination LIKE \"$value\" OR time LIKE \"$value\"
                            ORDER BY 'time' LIMIT 1 OFFSET $i";
                    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
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
                echo "</table>";
            }
        ?>
    </body>
</html>