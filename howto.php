<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Как добраться</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>

    <body>
        <?php
            include_once "nav.php";
        ?>
        <h2></h2>
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aabc0226b32d79135ef198ee8267fda2f6e64122d22ef22a0819b21177a5c4fa8&amp;source=constructor" 
            width="1000" height="700" frameborder="0" align="middle">
        </iframe>
        <h4>
            <?php
                echo file_get_contents("how_to.txt");
            ?>
        </h4>

    </body>
</html>