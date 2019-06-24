<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE["username"])){
        unset($_COOKIE["username"]);
        setcookie("username",null,time()-8600,"/");
        if(isset($_COOKIE["isAdmin"])){
            unset($_COOKIE["isAdmin"]);
            setcookie("isAdmin",null,time()-8600,"/");
        }
    }
    Header("Location: index.php");
?>