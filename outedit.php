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
        $f3 = "0";
        //Обработка введенных данных
        if (isset($_POST['submitB']) || isset($_POST['submit']) || isset($_POST['submitA']))
        {
            if (isset($_POST['submit']))
                $db = 'outcome';
            if (isset($_POST['submitB']))
                $db = 'outB';
            if (isset($_POST['submitA']))
                $db = 'outA';
            $num = $_POST['num'];
            $departure = $_POST['depart'];
            $destination = $_POST['destin'];
            $time = $_POST['times'];

            //Обработка введенных данных
            if ($num && $departure && $destination && $time)
            {
                //Внесение в таблицу изменений
                $query = "INSERT INTO `$db` (id, departure, destination, time)  VALUES (\"$num\", \"$departure\", \"$destination\", \"$time\")";
                $res = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
                echo "<script>
                                alert( 'Поезд добавлен' );
                                </script>";
            }
            //Обработка ошибки
            else
                $f1 = 1;
        }

        //Обработка введенных данных
        if (isset($_POST['deleteB']) || isset($_POST['delete']) || isset($_POST['deleteA']))
        {
            //Получение названия нужной таблицы из input type=radio
            if (isset($_POST['delete']))
                $db = 'outcome';
            if (isset($_POST['deleteB']))
                $db = 'outB';
            if (isset($_POST['deleteA']))
                $db = 'outA';
            $num = $_POST['numd'];
            //Обработка введенных данных
            if ($num)
            {
                $querry = "SELECT * FROM `$db` WHERE `id` LIKE '$num'";
                $result = mysqli_query($link, $querry) or die("Ошибка" . mysqli_error($link));
                //Проверка на наличие поезда в базе данных
                if (mysqli_num_rows($result) > 0) {
                    //Внесение в таблицу изменений
                    $query = "DELETE FROM `$db` WHERE `$db`.`id` LIKE \"$num\"";
                    mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
                    echo "<script>
                                alert( 'Поезд удален' );
                                </script>";
                } else
                    $f3 = "1";
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
                        echo "<div style=\"text-align:left\" class=\"error_msg\">
                                <output>Поле не заполнено</output><br/>
                              </div>";
                    if ($f3)
                        echo "<div style=\"text-align:left;\" class=\"error_msg\">
                        <output>Поезд не найден</output><br/>
                    </div>";
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
                    
                    <input id="time" type="text" name="times" placeholder="Время отправления" > <br/>
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
        </div> 
        </td>
                </tr>
    </table>
    </body>
</html>