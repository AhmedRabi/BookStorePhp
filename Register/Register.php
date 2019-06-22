<?php
    require '../Helper/Helper.php';
    define("MAX_LENGTH", 6);
    function generateHashWithSalt($password, $salt)
    {
    
        return hash("sha256", $password . $salt);
    }
    function generateSalt (){
        $intermediateSalt = md5(uniqid(rand(), true));
        $salt = substr($intermediateSalt, 0, MAX_LENGTH);
        return $salt;
    }
    $name = $_POST["name"];
    //echo "username <br/>";
    $email = $_POST["email"];
    //echo "email <br/>";
    $mobile = $_POST["mobile"];
    //echo "mobile <br/>";
    $password = $_POST["password"];
    //echo "password <br/>";
    $ConPassword = $_POST["ConPassword"];
    //echo "conpassword <br/>";
    $salt =generateSalt();

    if ($password == $ConPassword) {
        $password = generateHashWithSalt($password, $salt);
    }else{
        Header("Location: index.php");
    }

    $db = new DataBaseManger();
    $conn = $db->connectToDB();
    $query = "INSERT INTO users(user_type_id, name, email, mobile, password, salt) VALUES(2,'".$name."','".$email."','".$mobile."','".$password."','".$salt."')";
    if($conn){
        //echo "connected Successfully <br/>";
        if(mysqli_query($conn,$query)){
        //  echo "<h1>Registered Succssfully</h1>";
            Header("Location: ../index.php");
        }
        else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
?>