<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <meta charset="utf-8">
        <title>Поиск</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
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
                    <input type="radio" name="rad"  value="inB"> <a>Прибытие вчера</a>
                </div></th>

                <th><div style="text-align:center; margin-top: 5%;" class="pas_box">
                    <input type="radio" name="rad" value="outB"> <a>Отправление вчера</a>
                </div></th>
                    </tr>

                    <tr>
                <th><div style="text-align:center; margin-top: 5%;" class="pas_box" >
                    <input type="radio" name="rad"  value="income"> <a>Прибытие сегодня</a>
                </div></th>

                <th><div style="text-align:center; margin-top: 5%;" class="pas_box">
                    <input type="radio" name="rad" value="outcome"> <a>Отправление сегодня</a>
                </div></th>
                    </tr>

                    <tr>
                <th><div style="text-align:center; margin-top: 5%;" class="pas_box" >
                    <input type="radio" name="rad"  value="inA"> <a>Прибытие завтра</a>
                </div></th>

                <th><div style="text-align:center; margin-top: 5%;" class="pas_box">
                    <input type="radio" name="rad" value="outA"> <a>Отправление завтра</a>
                </div></th>
                    </tr>

                </table>

        <?php
            include_once("helphp/connection.php");

            $i = 0;
            $value = "";
            //Проверка введенных данных
            if (isset($_POST['submit']))
                if (isset($_POST['rad']) && $_POST['val']) {
                //Получение данных из бд
                $connect = $_POST['rad'];
                $value = $_POST['val'];
                //Получение количества строк таблицы
                $query = "SELECT COUNT(*) FROM $connect WHERE id REGEXP '$value' OR 
                        departure REGEXP '$value' OR destination REGEXP '$value' OR time REGEXP '$value'
                            ORDER BY 'time' LIMIT 1 OFFSET $i";
                $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
                $str = mysqli_fetch_assoc($result);
                $n = $str['COUNT(*)'];
                if ($n) {
                    $query = "SELECT *FROM $connect WHERE id REGEXP '$value' OR 
                        departure REGEXP '$value' OR destination REGEXP '$value' OR time REGEXP '$value'
                            ORDER BY 'time' LIMIT 1 OFFSET $i";
                    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
                    $str = mysqli_fetch_assoc($result);
                    //создание шаблона таблицы
                    echo "
                    <table class=\"ttable\" border=\"10\" cellpadding =\"10\" align=\"center\">
                        <tr>
                            <th>№ Поезда</th>
                            <th>Станция отправления</th>
                            <th>Станция назначения</th>
                            <th>Время прибытия</th>
                        </tr>";

                    //Заполнение таблицы данными из бд
                    while ($i < $n) {
                        $query = "SELECT *FROM $connect WHERE id REGEXP '$value' OR 
                        departure REGEXP '$value' OR destination REGEXP '$value' OR time REGEXP '$value'
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
                else
                    echo "<script>
                         alert( 'Поезда не найдены' );
                      </script>";
            } else
                echo "<div style=\"text-align:center\" class=\"error_msg\">
                                <output>Заполните главное поле и выберите, где искать</output><br/>
                              </div>";
        ?>
            <div style="text-align:center; margin-top: 30px">
                <input type="submit" name="submit" value="Поиск">
            </div>
        </form>
    </body>
</html>