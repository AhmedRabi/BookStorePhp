<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE["username"])){
        unset($_COOKIE["username"]);
        setcookie("username",null,-1,"/");
    }
    Header("Location: index.php");
?>