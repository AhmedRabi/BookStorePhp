<?php 
    require 'UserModel.php';
    require 'BookModel.php';
    class DataBaseManger {

        //database connection variables
        var $servername = "localhost";
        var $username = "root";
        var $password_ = "";
        var $db = "route_bookstore";
        var $conn;

        function __construct(){
            $this->conn =  new mysqli($this->servername,$this->username,$this->password_,$this->db);           
        }
        function connectToDB(){          
            return  $this->conn;
        }
        function connecToSpecificDB($server,$user,$password,$db){
            $this->conn =  new mysqli($server,$user,$password,$db);
            return  $this->conn;
        }
        function GetAllUsers(){
            $users = [];
            $query = "select * from users";
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $user = new User($row["id"],$row["name"],$row["password"],$row["salt"],$row["user_type_id"],$row["mobile"],$row["email"]);
                        array_push($users,$user);
                    }
                }
            }
            return $users;
        }    
        function GetAllBooks(){
            $books = [];
            $query = "select b.id,b.author,b.title,b.price,bc.category,bbc.photo
            from books b , book_cover bbc , book_category bc
            where b.category = bc.id and b.Cover = bbc.id
            GROUP by b.id";
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $book = new book($row["id"],$row["title"],$row["author"],$row["category"],$row["price"],$row["photo"]);
                        array_push($books,$book);
                    }
                }
            }
            return $books;
        }
        function getBookbyID($id){
            $query = "select b.id,b.author,b.title,b.price,bc.category,bbc.photo
            from books b , book_cover bbc , book_category bc
            where b.category = bc.id and b.Cover = bbc.id and b.id =".$id;    
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $book = new book($row["id"],$row["title"],$row["author"],$row["category"],$row["price"],$row["photo"]);
                       
                    }
                }
            }
            return $book;
        }
        function DeleteBook($id){
            $query = "delete from books where id=".$id;
            if($this->conn){
                mysqli_query($this->conn,$query);
            }
        }
        function insertPhoto($path){
            $query = 'INSERT INTO book_cover values('.$path.')';
            if($this->conn){
                mysqli_query($this->conn,$query);
            }
        }
        function getPhotoid($path){
            $query = 'SELECT id FROM book_cover where photo='.$path;
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                   $id = $row["id"];                   
                }
            }
        }
        function insertBook($book){
            $query= 'INSERT INTO books(category, title, author, price, Cover) VALUES ('.$book->category.','.$book->title.','.$book->author.','.$book->price.')';
            if($this->conn){
                mysqli_query($this->conn,$query);
            }
        }
    }

    class SecurityManager {
        var $password;
        var $salt;

        function __construct($password)
        {
            $this->password = $password;
            $this->salt = $this->generateSalt();
        }
        function generateHashWithSalt()
        {
            return hash("sha256",$this->password . $this->salt);
        }
        function generateSalt (){
            $intermediateSalt = md5(uniqid(rand(), true));
            $salt = substr($intermediateSalt, 0, MAX_LENGTH);
            return $salt;
        }
    }

    class AccountManager {      
        var $user;

        function __construct($userdata)
        {
            $this->user = $userdata;
        }
    }
?>