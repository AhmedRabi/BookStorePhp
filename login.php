<?php 
$servername  = ".\SQLEXPRESS";
// $username = "PhpLogger";
// $password = "123";
// $db = "Route_BookStore";
$connectionInfo = array( "Database"=>"Route_BookStore");
// $conn =  new mysqli($servername,$username,$password);
$conn =     qlsrv_connect( $serverName, $connectionInfo);
//check connection
// if($conn ->connect_error){
//     die("Connection Failed". $conn->connect_error);

// }
// echo "Connected Successfully"
if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}
?>