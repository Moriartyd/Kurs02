<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Курский вокзал</title>
        <link rel="stylesheet" type="text/css" href="Try_Kurs.css">
    </head>
    <body>
        <?php
            include_once "nav.php"
        ?>
        
        <div class="container">
            <form method="post">
                <div style="text-align:center" class="name_box">
                    <input type="text" name="login" placeholder="Придумайте логин"> <br/>
                </div>

                <div style="text-align:center" class="pas_box">
                    <input type="password" name="pass" placeholder="Придумайте пароль"> <br/>
                </div>

                <div style="text-align:center" class="pas_box">
                    <input type="password" name="pass" placeholder="Введите пароль"> <br/>
                </div>

                <div style="text-align:center; margin-top: 5%;" class="button">
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </body>
</html>