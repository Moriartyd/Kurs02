<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="nav.css">
        <link rel="stylesheet" type="text/css" href="input.css">
        <link rel="stylesheet" type="text/css" href="texts.css">
        <link rel="stylesheet" type="text/css" href="table.css">
    </head>
    <body>
        <?php
        include_once("nav.php");
        include_once("connection.php");
        $link = mysqli_connect($host, $user, "", $database)
                or die("Ошибка" . mysql_error($link));
        mysqli_query($link, $q) or die("" . mysqli_error($link));

        $f = "0";
        if (isset($_POST['submit']))
        {
            $num = $_POST['num'];
            $departure = $_POST['depart'];
            $destination = $_POST['destin'];
            $time = $_POST['time'];

            if ($num && $departure && $destination && $time)
            {
                $query = "INSERT INTO income (id, departure, destination, time)
                            VALUES ('$num', '$departure', '$destination', '$time')";
                mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
            } else {
                $f = "1";
            }
        }
        ?>
        <table class="ttable" cellpadding = "90" align="center"> <tr>
		<td><div class="sub_container1">
            <form method="post">
                    <div style="text-align:center">
                        <output>Удалить поезд из расписания по номеру</output><br/>
                    </div>
                <div style="text-align:center" class="name_box">
                    <input type="text" name="num" placeholder="№ поезда"> <br/>
                </div>

                <?php
                    if ($f)
                    {
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                        <output>Не все поля заполнены.</output><br/>
                    </div>";
                    }
                ?>

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Удалить">
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
                    <input id="time" type="text" name="time" > <br/>
                </div>

                <?php
                    if ($f)
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
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
                    <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
                    <script src="js/script.js" type="text/javascript">
    </body>
</html>