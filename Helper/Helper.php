<?php 
    require 'UserModel.php';
    require 'BookModel.php';
    require 'CategoryModel.php';
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
            $query = "select b.id,b.author,b.title,b.price,bc.category,b.Cover
            from books b , book_category bc
            where b.category = bc.id 
            GROUP by b.id";
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $book = new Book($row["title"],$row["author"],$row["category"],$row["price"],$row["Cover"]);
                        $book->setID($row["id"]);
                        array_push($books,$book);
                    }
                }
            }
            return $books;
        }
        function getBookbyID($id){
            $query = "select b.id,b.author,b.title,b.price,bc.category,b.Cover
            from books b, book_category bc
            where b.category = bc.id and b.id =".$id;    
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $book = new Book($row["title"],$row["author"],$row["category"],$row["price"],$row["Cover"]);
                        $book->setID($row["id"]);
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
        function insertBook($book){
            $query= "INSERT INTO books(category, title, author, price, Cover) VALUES (".$book->category.",'".$book->title."','".$book->author."',".$book->price.",'".$book->photo."')";
            if($this->conn){
                mysqli_query($this->conn,$query);
            }
        }
        function GetAllCategories(){
            $query = "select * from book_category order by id ASC";
            $categories = [];
          
            if($this->conn){
                $result = mysqli_query($this->conn,$query);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $cat = new Category($row["Category"],$row["id"]);
                        array_push($categories,$cat);
                    }
                }
            }
            return $categories;
        }
        function UpdateBook($book){
            $query="Update books set category=".$book->category." ,title='".$book->title."' ,author='".$book->author."',price=".$book->price.",Cover = '".$book->photo."' where id =".$book->id;
            if($this->conn){
                mysqli_query($this->conn,$query);
            }
        }
        function UploadImage($image,$book){
           
            $target_dir ="/images/BooksImages/";
            $target_file = $target_dir . basename($this->getGUID()."book.jpg");
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image            
            $check = getimagesize($image["tmp_name"]);
            if($check !== false) {
               
                $uploadOk = 1;
            } else {
               return "it's not an image";
                $uploadOk = 0;
            }   
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
               return "Not Correct File type";
                $uploadOk = 0;
            } 
            // Check if file already exists change its name    
            while(file_exists($target_file)) {              
                $target_file = $target_dir . basename($this->getGUID()."book");                 
            }     
            if ($uploadOk == 0) {
                return "Sorry, your file can not be uploaded.";           
            } else {
                if (move_uploaded_file($image["tmp_name"],  __DIR__.$target_file)) {
                   return $target_file;
                } else {
                    return "Sorry, your file was not uploaded.";
                } 
            }
        }
        function getGUID(){
            if (function_exists('com_create_guid')){
                return com_create_guid();
            } else {
                return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
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