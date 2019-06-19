<?php 
define("MAX_LENGTH", 6);
function generateHashWithSalt($password, $salt)
{
    return hash("sha256", $password . $salt);
}

//form data
$email = $_POST["email"];
$password1 =$_POST["password"];

//database connection
$servername = "localhost";
$username = "root";
$password_ = "";
$db = "route_bookstore";
$conn =  new mysqli($servername,$username,$password_,$db);
$selectquery = "select * from users where email ='".$email."'";

//check connection
if($conn){
    $result = mysqli_query($conn, $selectquery);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $hashedPW =generateHashWithSalt($password1,$row["salt"]);    
            // echo $row["email"]."<br/>".$row["salt"]."<br/>".$row["user_type_id"]."<br/>".$row["password"]."<br/>".$row["id"]."<br/>";      
            if($row["password"] == $hashedPW){              
                // echo $hashedPW ."<br/>" .$row["password"]."<br/>".$password1;
                Header("Location: BookList/list.php");
            }else {
                // echo '<h1 class="text-danger">Wrong email or password<h1/>
                //         <a href="index.html" class="btn btn-info">back to login</a>';
                        Header("Location: index.php");
            }
            }      
}else{
    Header("Location: index.php");
}
}else{
     die("Connection Failed". $conn->connect_error);
}  
?>