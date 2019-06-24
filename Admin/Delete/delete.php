<?php 
    require '../../Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
        $dbm = new DataBaseManger();
        if(isset($_POST["id"])){
         $id = $_POST["id"];
     }
     //echo $_SERVER["HTTP_HOST"];
     $Book = $dbm->getBookbyID($id);
     $dbm->DeleteBook($id);
     $photo = "http://".$_SERVER["HTTP_HOST"]."/BookstorePhp".$Book->photo;
     unlink($myFile) or die("Couldn't delete file");
     }else{
         Header("Location: ../../Login");
     }
?>