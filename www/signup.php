<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('test');

$name = $_POST['name_s'];
$email = $_POST['email_s'];
$password = $_POST['password_s'];
$cover = "../images/bg.png";
$photo = "../images/addPhoto.png";

mysql_query("INSERT INTO people (name, email, password) VALUES ('$name','$email','$password') ");
mysql_query("INSERT INTO user_photoes (cover, photo, user_email) VALUES ('$cover','$photo','$email') ");
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Communio</title>
    <link href="/styles/styleSignup.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
    <img class="logo" src="images/logo.png" width="220px"/>
</div>
<div class="texst" align="center">
    <table class="centerTable" align="center">
        <tr>
            <td>
                <h1 class="h1">Регистрация прошла успешно!</h1>
                <p class="p">Проверьте Вашу эл. почту для дальнейшей работы!</p>
            </td>
        </tr>
        <tr>
            <td>
                <a href="welcome.php" >На главную</a>
            </td>
        </tr>
    </table>
</div>
<!--<div class="bg-image"></div>-->
<div class="footer" align="center">
    <p>a Kirill Korolev Production &copy; 2015</p>
</div>
</body>
</html>