<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/edit.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
        <link rel="stylesheet" type="text/css" href="styles/table.css">
    </head>
    <body>
        <?php
        include_once("helphp/nav.php");
        include_once("helphp/connection.php");

        $f1 = "0";
        $f2 = "0";
        //Обработка введенных данных
        if (isset($_POST['submitB']) || isset($_POST['submit']) || isset($_POST['submitA']))
        {
            if (isset($_POST['submit']))
                $db = 'income';
            if (isset($_POST['submitB']))
                $db = 'inB';
            if (isset($_POST['submitA']))
                $db = 'inA';
            $num = $_POST['num'];
            $departure = $_POST['depart'];
            $destination = $_POST['destin'];
            $time = $_POST['time'];

            //Обработка введенных данных
            if ($num && $departure && $destination && $time)
            {
                //Внесение в таблицу изменений
                $query = "INSERT INTO `$db` (id, departure, destination, time)  VALUES (\"$num\", \"$departure\", \"$destination\", \"$time\")";
                $res = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
            }
            //Обработка ошибки
            else
                $f1 = 1;
        }

        //Обработка введенных данных
        if (isset($_POST['deleteB']) || isset($_POST['delete']) || isset($_POST['deleteA']))
        {
            if (isset($_POST['delete']))
                $db = 'income';
            if (isset($_POST['deleteB']))
                $db = 'inB';
            if (isset($_POST['deleteA']))
                $db = 'inA';
            $num = $_POST['numd'];
            //Обработка введенных данных
            if ($num)
            {
                //Внесение в таблицу изменений
                $query = "DELETE FROM `$db` WHERE `$db`.`id` LIKE \"$num\"";
                mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
            }
            else
                $f2 = 1;
        }

        ?>
        <table class="ttable" cellpadding = "90" align="center"> <tr>
		<td><div class="sub_container1">
            <form method="post">
                    <div style="text-align:center">
                        <output>Удалить поезд из расписания по номеру</output><br/>
                    </div>
                <div style="text-align:center" class="name_box">
                    <input type="text" name="numd" placeholder="№ поезда"> <br/>
                </div>

                <?php
                    if ($f2)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Поле не заполнено</output><br/>
                    </div>";
                    }
                ?>

            <table>
                <tr>
                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="left" name="deleteB" value="Удалить вчера">
                        </div>
                    </th>

                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="cen" name="delete" value="Удалить сегодня">
                        </div>
                    </th>

                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="right" name="deleteA" value="Удалить завтра">
                        </div>
                    </th>
                </tr>
            </table>

            </form>
        </div> </td>

    <td><div class="sub_container2">
            <form method="post">
            <div style="text-align:center">
                        <output>Добавить поезд в расписание</output><br/>
                    </div>
                <div style="text-align:center" class="name_box">
                    <input type="text" name="num" placeholder="№ поезда"> <br/>
                </div>

                <div style="text-align:center" class="pas_box">
                    <input type="text" name="depart" placeholder="Станция отправления"> <br/>
                </div>

                <div style="text-align:center" class="num_box">
                    <input type="text" name="destin" placeholder="Станция назначения"> <br/>
                <!-- </div>
                
                <div style="text-align:center" class="num_box"> --> 
                    <input id="time" type="text" name="time" placeholder="Время прибытия"> <br/>
                </div>

                <?php
                    if ($f1)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Не все поля заполнены.</output><br/>
                    </div>";
                    }
                ?>

            <table>
                <tr>
                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="left" name="submitB" value="Добавить вчера">
                        </div>
                    </th>

                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="cen" name="submit" value="Добавить сегодня">
                        </div>
                    </th>

                    <th>
                        <div style="text-align:center;">
                            <input type="submit" class="right" name="submitA" value="Добавить завтра">
                        </div>
                    </th>
                </tr>
            </table>

            </form>
        </div> </td>
                </tr></table>
    </body>
</html>