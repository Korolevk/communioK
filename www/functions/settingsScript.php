<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('test');

$name = $_SESSION["name"];
$email = $_SESSION['email'];
$pass = $_SESSION["password"];

$change_name_NAME = $_POST['name'];
$change_name_PASSWORD = $_POST['password_nameChange'];

function changeName($name,$password,$pass,$email){
    if (isset($name) || isset($password)) {
        if (!empty($name) && !empty($password)){
            if ($password === $pass) {
                mysql_query("UPDATE people SET name = '$name' WHERE email = '$email'");
                return "<tr><td><p class='error'>Имя успешно изменено!</p></td></tr>";
            } else {
                return "<tr><td><p class='error'>Неверный пароль!</p></td></tr>";
            }
        }else{
            return "<tr><td><p class='error'>Поля не должны быть пустыми!</p></td></tr>";
        }
    }
};

$changePassword_old_password = $_POST['old_passChange'];
$changePassword_new_password = $_POST['new_passChange'];
$changePassword_new_password2 = $_POST['2_new_passChange'];

function changePassword($email, $pass, $password, $new_password, $new_password_2){
    if (isset($password) || isset($new_password) || isset($new_password_2)) {
        if (empty($password) || empty($new_password) || empty($new_password_2)) {
            return "<tr><td><p class='error'>Поля не должны быть пустыми!</p></td></tr>";
        } else {
            if ($password === $pass && $new_password === $new_password_2) {
                mysql_query("UPDATE people SET password = '$new_password' WHERE email = '$email'");
                return "<tr><td><p class='error'>Пароль успешно изменен!</p></td></tr>";
            } else {
                return "<tr><td><p class='error'>Пароли не совпадают!</p></td></tr>";
            }
        }
    }
};

function uploadCover($cover,$email){
    if(isset($cover)){
        if($_FILES['cover']['error'] == 0){
            if($_FILES['cover']['size'] <= 5000000){
                if(
                    $_FILES['cover']['type'] == "image/jpg" ||
                    $_FILES['cover']['type'] == "image/jpeg" ||
                    $_FILES['cover']['type'] == "image/png" ||
                    $_FILES['cover']['type'] == "image/bmp" ||
                    $_FILES['cover']['type'] == "image/gif"
                ){
                    $upfile = 'upload/'.$_FILES['cover']['name'];
                    move_uploaded_file($_FILES['cover']['tmp_name'], $upfile);
                    $img = 'http://test/upload/'.$_FILES['cover']['name'];
                    mysql_query("UPDATE user_photoes SET cover='$img' WHERE user_email='$email'");
                }else{
                    return "<tr><td><p class='error'>Неверный тип файла</p></td></tr>";
                }
            }else{
                return "<tr><td><p class='error'>Файл слишком большой</p></td></tr>";
            }
        }else{
            return "<tr><td><p class='error'>Ошибка при загрузке файла</p></td></tr>";
        }
    }
};

function uploadPhoto($photo,$email){
    if(isset($photo)){
        if($_FILES['photo']['error'] == 0){
            if($_FILES['photo']['size'] < 5000000){
                if(
                    $_FILES['photo']['type'] == "image/jpg" ||
                    $_FILES['photo']['type'] == "image/jpeg" ||
                    $_FILES['photo']['type'] == "image/png" ||
                    $_FILES['photo']['type'] == "image/bmp" ||
                    $_FILES['photo']['type'] == "image/gif"
                ){
                    $upfile = 'upload/'.$_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], $upfile);
                    $img = 'http://test/upload/'.$_FILES['photo']['name'];
                    mysql_query("UPDATE user_photoes SET photo='$img' WHERE user_email='$email'");
                 }else{
                    return "<tr><td><p class='error'>Неверный тип файла</p></td></tr>";
                }
            }else{
                return "<tr><td><p class='error'>Файл слишком большой</p></td></tr>";
            }
        }else{
            return "<tr><td><p class='error'>Ошибка при загрузке файла</p></td></tr>";
        }
    }
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

$change_name = changeName($change_name_NAME,$change_name_PASSWORD,$pass,$email);
$change_password = changePassword($email,$pass,$changePassword_old_password,$changePassword_new_password,$changePassword_new_password2);
$change_cover = uploadCover($_FILES['cover'],$email);
$change_photo = uploadPhoto($_FILES['photo'],$email);

?>