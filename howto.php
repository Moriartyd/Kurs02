<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="resources/favicon.ico" type="image/x-icon">
        <title>Как добраться</title>
        <link rel="stylesheet" type="text/css" href="styles/frgments.css">
        <link rel="stylesheet" type="text/css" href="styles/nav.css">
        <link rel="stylesheet" type="text/css" href="styles/texts.css">
    </head>

    <body>
        <?php
            include_once "helphp/nav.php";
        ?>
        <!--Подключение виджета Яндекс.Карты-->
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aabc0226b32d79135ef198ee8267fda2f6e64122d22ef22a0819b21177a5c4fa8&amp;source=constructor" 
            width="800" height="560" frameborder="0" align="middle">
        </iframe>
        <h4>
            <?php
                //Вывод на экран содержимого файла
                echo file_get_contents("resources/how_to.txt");
            ?>
        </h4>

    </body>
</html>