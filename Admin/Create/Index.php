<?php
    require '../../Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
       $dbm = new DataBaseManger();
        
    }else{
        Header("Location: ../../Login");
    }  
?>