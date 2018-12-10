<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/input.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
        <link rel="stylesheet" type="text/css" href="styles/table.css">
    </head>
    <body>
        <?php
        include_once("helphp/nav.php");
        include_once("helphp/connection.php");
        $link = mysqli_connect($host, $user, $pas, $database)
                or die("Ошибка" . mysql_error($link));
        mysqli_query($link, $q) or die("" . mysqli_error($link));

        $f1 = "0";
        $f2 = "0";
        if (isset($_POST['submit']))
        {
            $num = $_POST['num'];
            $departure = $_POST['depart'];
            $destination = $_POST['destin'];
            $time = $_POST['time'];

            if ($num && $departure && $destination && $time)
            {
                $query = "INSERT INTO outcome (id, departure, destination, time)
                            VALUES (\'$num\', \'$departure\', \'$destination\', \'$time\')";
                mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
            } else {
                $f1 = "1";
            }
        }

        if (isset($_POST['delete']))
        {
            $num = $_POST['numd'];
            if ($num)
            {
                $query = "DELETE FROM `outcome` WHERE `outcome`.`id` = \'$num\''";
                mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
            }
            else
                $f2 = "1";
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

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="delete" value="Удалить">
                </div>

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
                    <input id="time" type="text" name="time" placeholder="Время отправления" > <br/>
                </div>

                <?php
                    if ($f1)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Не все поля заполнены.</output><br/>
                    </div>";
                    }
                ?>

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Добавить">
                </div>

            </form>
        </div> </td>
                </tr></table>
    </body>
</html>