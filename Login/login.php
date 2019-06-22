<?php 
require '../Helper/Helper.php';
$dbmanager = new DataBaseManger();
define("MAX_LENGTH", 6);

function generateHashWithSalt($password, $salt)
{
    return hash("sha256", $password . $salt);
}

//form data
$email = $_POST["email"];
$password1 =$_POST["password"];
if(isset($_POST["rememberMe"])){
    $rememberMe = true;
}else{
    $rememberMe=false;
}
//database connection
$conn = $dbmanager->connectToDB();

$selectquery = "select * from users where email ='".$email."'";

//check connection
if($conn){
    $result = mysqli_query($conn, $selectquery);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hashedPW =generateHashWithSalt($password1,$row["salt"]);    
            if($row["password"] == $hashedPW){    
                //logged in successfully  
                session_start();
                $_SESSION["username"]=$row["email"];
                $_SESSION["userID"]=$row["id"];
                if($rememberMe){
                   setcookie("username",$row["email"],time()+(86400*30),"/");
                }
                if($row["user_type_id"]==1){
                    $_SESSION["isAdmin"]= true;
                    //echo "its admin";
                    Header("Location: ../Admin");
                }else{
                Header("Location: ../List.php");//Go to BooksList
                // echo "logged in successfully";
                }
            }else {
                //the password isnt correct
                Header("Location: index.php");//Back to same Page
                // echo "incorrect Password";
            }
        }      
}else{
    //there is no user with that email
    Header("Location: index.php");
    // echo "incorrect username";
}
}else{
     die("Connection Failed". $conn->connect_error);
}  
?>