<?php
include_once __DIR__.'/functions/userScript.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Communio</title>
    <link href="../styles/styleUser.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
    <table>
        <tr>
            <td style="padding: 0px 555px 0px 0px;"><img class="logo" src="http://test/images/logo.png" width="220px"/></td>
            <td><a href="../user.php">Моя&nbsp;страница</a></td>
            <td><a href="../settings.php">Настройки</a></td>
            <td>
                <form class="LogoutButton" action="user.php" method="post">
                    <input type="submit" name="logout" value="Выйти">
                </form>
            </td>
        </tr>
    </table>
</div>
<div class="texst" align="center">
    <table class="centerTable" align="center" style="background-image: url(<?php echo showCover($email); ?>);">
        <tr style="background: linear-gradient(to top, rgba(29, 27, 27, 1), rgba(73, 73, 73, 0.26), rgba(255, 255, 255, 0));">
            <td class="userPhoto" style="background-image: url(<?php echo showPhoto($email); ?>);">
            </td>
            <td class="mainInfo" style="width: 1px;">
                <p class="nameSurname"><?php echo $_SESSION['name']; ?></p>
            </td>
        </tr>
    </table>
</div>
<div class="photoes" align="center">
    <div class="allPhotoes" style="max-width: 720px;">
        <?php
            echo galeryPhotoes($email);
        ?>
    </div>
    <table>
        <tr>
            <td><p>Добавить фотографии</p></td>
        </tr>
        <tr>
            <form action="/user.php" method="post" enctype="multipart/form-data">
                <td>
                    <input class="galeryFile" type="file" name="galeryFile" />
                </td>
        </tr>
        <tr>
            <td style="padding: 15px 0px;">
                <input class="submit_galeryFile" type="submit" name="submit_galeryFile" value="Добавить" />
            </td>
        </tr>
        </form>
    </table>
</div>
<div class="wall" align="center">
    <table>
        <tr>
            <td class="wall_top_cover"><a href="#">Записей на стене: <?php echo countAllPosters($email);?></a></td>
        </tr>
        <tr>
            <td class="wall_middle_cover">
                <form action="/user.php" method="post">
                    <table>
                        <tr><td>
                            <textarea name="wall_post" cols="86" rows="5" placeholder="Что нового?"></textarea>
                        </td></tr>
                        <tr><td>
                            <input class="wall_post_sub" type="submit" name="wall_post_sub" value="Отправить"/>
                        </td></tr>
                    </table>
                </form>
            </td>
        </tr>
        <!-- UserComment -->
<!--        <tr>-->
<!--            <td>-->
<!--                <table class="user_message">-->
<!--                    <tr>-->
<!--                        <td>-->
<!--                            <a href='#'><img src="../images/addPhoto.png" width='100'/></a>-->
<!--                        </td>-->
<!--                        <td style="width: 510px;">-->
<!--                            <p class="nameAndSurname">Name Surname</p>-->
<!--                            <p class="TimeOfComment">20:17 22 июня 2014г.</p>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
        <?php
            echo AllPosters($email);
        ?>
    </table>
</div>
<div class="footer" align="center">
    <p>a Kirill Korolev Production &copy; 2015</p>
</div>
</body>
</html>