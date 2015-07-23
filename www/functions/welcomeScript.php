<?php
session_start();
mysql_connect('localhost', 'root', '');
mysql_select_db('test');

$email = $_POST['email'];
$pass = $_POST['password'];
$check = $_POST['checkbox'];

$mysql_query = mysql_query("SELECT email, password, name FROM people WHERE email='$email'");
$mysql = mysql_fetch_array($mysql_query);

function isEmptyFields($email,$pass){
    if(isset($email) || isset($pass)) {
        if (empty($email) || empty($pass)) {
            $res = "<p style='color:#ffffff;'>Поля не должны оставаться пустыми.</p>";
        }
    }else{
        $res = '';
    };
    return $res;
};

function isUserHere($email,$pass,$mysql){
    if(isset($email) || isset($pass)) {
        if($mysql['email'] !== $email || $mysql['password'] !== $pass) {
            $res = "<p style='color:#ffffff;'>Пользователь не зарегистрирован.</p>";
        }
        if (empty($email) || empty($pass)) {
            $res = "";
        }
    }else{
        $res = '';
    };
    echo $res;
};

function toUserPage($email,$pass,$mysql,$check,$mysql_userPhotoes){
    if(isset($email) || isset($pass)) {
        if ($mysql['email'] == $email && $mysql['password'] == $pass) {
            header('Location: http://test/user.php/');
            $_SESSION['email'] = $email;
            setcookie('email',$mysql['email'], time()+86400, '/');
        }
        if($check == 'check'){
            $_SESSION['check'] = $check;
        };
    }
};

toUserPage($email,$pass,$mysql,$check,$mysql_userPhotoes);

?>