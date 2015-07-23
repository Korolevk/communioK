<?php
if(isset($_COOKIE['email'])){
    header('Location: http://test/user.php/');
}else{
    header('Location: http://test/welcome.php/');
}
?>