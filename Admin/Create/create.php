<?php 
    require '../../Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
        $dbm = new DataBaseManger();       
        //echo $_SERVER["HTTP_HOST"];
        $Book = new Book("","","","","");
        $photo = "";
        //Upload Photo here and use it in the CreateBook Method
       
      
        $Book = new Book($_POST["title"],$_POST["author"],$_POST["category"],$_POST["price"],$photo);
        if(isset($_FILES["photo"])){
            $photo=$dbm->UploadImage($_FILES["photo"],$Book);
        }
        $Book->setPhoto($photo);
        $dbm->insertBook($Book);              
        Header("Location: ../index.php");
    }else{
        Header("Location: ../../Login");
    }
?>