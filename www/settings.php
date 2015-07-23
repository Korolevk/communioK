<?php
session_start();
include_once __DIR__.'/functions/settingsScript.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Настройки</title>
    <link href="/styles/styleSettings.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
    <table>
        <tr>
            <td style="padding: 0px 555px 0px 0px;"><img class="logo" src="http://test/images/logo.png" width="220px"/></td>
            <td><a href="http://test/user.php">Моя&nbsp;страница</a></td>
            <td><a href="http://test/settings.php">Настройки</a></td>
            <td>
                <form class="LogoutButton" action="user.php" method="post">
                    <input type="submit" name="logout" value="Выйти">
                </form>
            </td>
        </tr>
    </table>
</div>
<div class="texst" align="center">
    <table class="centerTable" align="center" style="background-image: url(<?php echo showCover($email); ?>);" >
        <tr style="background: linear-gradient(to top, rgba(29, 27, 27, 1), rgba(73, 73, 73, 0.26), rgba(255, 255, 255, 0));">
            <td class="userPhoto" style="background-image: url(<?php echo showPhoto($email); ?>);">
            </td>
            <td class="mainInfo" style="width: 1px;">
                <p class="nameSurname"><?php echo $name;?></p>
            </td>
        </tr>
    </table>
</div>
<div class="coverChange" align="center">
    <table>
        <tr>
            <td><p>Изменить обложку</p></td>
        </tr>
        <tr>
            <form action="/settings.php" method="post" enctype="multipart/form-data">
            <td>
                <input class="cover" type="file" name="cover" />
            </td>
        </tr>
        <tr>
            <td style="padding: 15px 0px;">
                <input class="submit_cover" type="submit" name="submit_cover" value="Изменить обложку" />
            </td>
        </tr>
        <?php echo $change_cover; ?>
        </form>
    </table>
</div>
<div class="photoChange" align="center">
    <table>
        <tr>
            <td><p>Изменить фото</p></td>
        </tr>
        <form action="/settings.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>
                    <input class="photo" type="file" name="photo" value="file" />
            </td>
        </tr>
            <tr>
                <td style="padding: 15px 0px;">
                    <input class="submit_photo" type="submit" name="submit_photo" value="Изменить фото" />
                </td>
            </tr>
            <?php echo $change_photo; ?>
        </form>
    </table>
</div>
<div class="nameChange" align="center">
    <table>
        <tr>
            <td><p>Изменить имя</p></td>
        </tr>
        <form action="/settings.php" method="post">
        <tr>
            <td>
                <input type="text" name="name" placeholder="Введите имя" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="password" name="password_nameChange" placeholder="Введите пароль" />
            </td>
        </tr>
        <tr>
            <td style="padding: 15px 0px;">
                <input class="submit_name" type="submit" name="submit_nameChange" value="Изменить имя" />
            </td>
        </tr>
            <?php echo $change_name; ?>
        </form>
    </table>
</div>
<div class="passChange" align="center">
    <table>
    <tr>
        <td><p>Изменить пароль</p></td>
    </tr>
        <form action="/settings.php" method="post">
            <tr>
                <td>
                    <input type="password" name="old_passChange" placeholder="Введите старый пароль" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="new_passChange" placeholder="Введите новый пароль" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="2_new_passChange" placeholder="Повторите пароль" />
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 0px;">
                    <input class="submit_pass" type="submit" name="submit_passChange" value="Изменить пароль" />
                </td>
            </tr>
            <?php echo $change_password; ?>
        </form>
    </table>
</div>
<div class="footer" align="center">
    <p>a Kirill Korolev Production &copy; 2015</p>
</div>
</body>
</html>