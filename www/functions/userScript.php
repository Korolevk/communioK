<?php
/**
 * Created by Kirill.
 * Date: 04.07.2015
 * Time: 14:46
 */

session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('test');

if(isset($_POST['logout'])){
    unset($S_SESSION["name"]);
    session_destroy();
    setcookie('email','', time()-86400, "/");
    header('Location: http://test/welcome.php/');
    exit();
}

$email = $_SESSION['email'];

$mysql_query_userPhotoes = mysql_query("SELECT cover, photo FROM user_photoes WHERE user_email='$email'");
$mysql_userPhotoes = mysql_fetch_array($mysql_query_userPhotoes);

$_SESSION['cover'] = $mysql_userPhotoes['cover'];
$_SESSION['photo'] = $mysql_userPhotoes['photo'];

$mysql_query = mysql_query("SELECT email, password, name FROM people WHERE email='$email'");
$mysql = mysql_fetch_array($mysql_query);

$_SESSION["name"] = $mysql['name'];
$_SESSION["email"] = $mysql['email'];
$_SESSION["password"] = $mysql['password'];

function InsertPhotoesOnGalery($photo,$email){
    if (!empty($photo['type'])) {
        if ($photo['error'] == 0) {
            if ($photo['size'] < 5000000) {
                if (
                    $photo['type'] == "image/jpg" ||
                    $photo['type'] == "image/jpeg" ||
                    $photo['type'] == "image/png" ||
                    $photo['type'] == "image/bmp" ||
                    $photo['type'] == "image/gif"
                ) {
                    $photo['name'] = date('dmyGis') . '.jpg';
                    $upfile = 'galeryPhotoes/' . $photo['name'];
                    move_uploaded_file($photo['tmp_name'], $upfile);
                    $img = '../galeryPhotoes/' . $photo['name'];
                    mysql_query("INSERT INTO galery_photoes (photo,user_email) VALUES ('$img','$email')");
                    header('Location: ../user.php');
                } else {
                    return "<tr><td><p class='error'>Неверный тип файла</p></td></tr>";
                }
            } else {
                return "<tr><td><p class='error'>Файл слишком большой</p></td></tr>";
            }
        } else {
            return "<tr><td><p class='error'>Ошибка при загрузке файла</p></td></tr>";
        }
    }
};

function galeryPhotoes($email){
    $res = mysql_query("SELECT * FROM galery_photoes WHERE user_email='$email'");
    while($row = mysql_fetch_array($res)){
        echo "<a href='#'><img src='" . $row['photo'] . "' width='220'/></a>";
    };
};

function addPostInDB($poster,$name,$email){
    if(isset($poster)){
        $date = date('G:i j M Yг.');
        if(!empty($poster)){
            mysql_query("INSERT INTO posters (date,name,user_email,text) VALUES ('$date','$name','$email','$poster')");
            header('Location: ../user.php');
        }else{
            echo 'Пустое поле';
        }
    }
}

function AllPosters($email){
    $res = mysql_query("SELECT * FROM posters WHERE user_email='$email'");
    $res_photo = mysql_query("SELECT photo FROM user_photoes WHERE user_email='$email'");
    $row_photo = mysql_fetch_array($res_photo);
    while($row = mysql_fetch_array($res)){
        echo "
            <tr>
            <td>
                <table class='user_message'>
                    <tr>
                        <td class='photoOfUser' style='background-image: url(".$row_photo['photo'].")'>
                        </td>
                        <td style='width: 510px;'>
                            <p class='nameAndSurname'>".$row['name']."</p>
                            <p class='TimeOfComment'>".$row['date']."</p>
                        </td>
                    </tr>
                    <tr colspan='2'>
                        <td colspan='2'>
                            <p class='userComment'>".$row['text']."</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        ";
    };
};

function countAllPosters($email){
    $res = mysql_query("SELECT COUNT(*) FROM posters WHERE user_email='$email'");
    $row = mysql_fetch_array($res);
    echo $row[0];
};

function showPhoto($email){
    $res = mysql_query("SELECT photo FROM user_photoes WHERE user_email='$email'");
    $row = mysql_fetch_array($res);
    echo $row['photo'];
};

function showCover($email){
    $res = mysql_query("SELECT cover FROM user_photoes WHERE user_email='$email'");
    $row = mysql_fetch_array($res);
    echo $row['cover'];
};

InsertPhotoesOnGalery($_FILES['galeryFile'],$email);
addPostInDB($_POST['wall_post'],$_SESSION["name"],$email);
