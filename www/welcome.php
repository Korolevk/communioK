<?php
include_once __DIR__ . '/functions/welcomeScript.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Communio</title>
    <link href="/styles/styleWelcome.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="header">
        <img class="logo" src="http://test/images/logo.png" width="220px"/>
    </div>
    <div class="texst" align="center">
        <table class="centerTable" align="center">
            <tr>
                <td rowspan="2">
                    <h1 class="h1">Привет, добро пожаловать в Communio!</h1>
                    <p class="p">Это моя пробная социальная сеть.</p>
                </td>
                <td class="td1">
                    <form class="formLogin" action="/welcome.php" method="post">
                        <table>
                            <tr>
                                <td class="td" >
                                    <input class="input" type="email" name="email" placeholder="Эл. почта" /><br />
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input class="input" type="password" name="password" placeholder="Пароль" /><br />
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <label class="check" ><input type="checkbox" name="checkbox" value="check" checked/> Запомнить?</label>
                                    <a class="forgetPass" href="/">Забыли пароль?</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input type="submit" class="buttonLogin" name="go" value="Войти" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php echo isUserHere($email,$pass,$mysql);?>
                    <?php echo isEmptyFields($email,$pass);?>
                </td>
            </tr>
            <tr>
                <td class="td1">
                    <form class="formSignup" action="/signup.php" method="post">
                        <table>
                            <tr>
                                <td class="td">
                                    <p class="textSignup"><b>Впервые тут?</b> Зарегистрируйтсь!</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input class="input" type="text" name="name_s" placeholder="Имя и фамилия" /><br />
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input class="input" type="email" name="email_s" placeholder="Эл. почта" /><br />
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input class="input" type="password" name="password_s" placeholder="Пароль" /><br />
                                </td>
                            </tr>
                            <tr>
                                <td class="td">
                                    <input class="buttonSignup" type="submit" name="go_s" value="Регистрация" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <!--<div class="bg-image"></div>-->
    <div class="footer" align="center">
        <p>a Kirill Korolev Production &copy; 2015</p><br />
    </div>
</body>
</html>