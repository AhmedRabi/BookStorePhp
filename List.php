<?php 
    require 'Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
       $dbm = new DataBaseManger();
       $books = $dbm -> GetAllBooks();
      
    }else{
        Header("Location: Login");
    }  
?>
<!doctype html>
<html lang="en">

<head>
    <title>Books Shelve</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles/bootstrap.min.css" >
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Book Store</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION["isAdmin"])){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="Admin/index.php">Admin</a>
                </li> ';
                }?> 
                <li class="nav-item active">
                    <a class="nav-link" href="Logout.php">Logout</span></a>
                </li>
            </ul>
           
        </div>
    </nav>
    <div class="container" style="padding-top:5em">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <?php
                foreach($books as $book){
                echo  '<div class="card">
                    <img src="http://localhost:330/BookstorePhp'.$book->photo.'" class="card-img-top" alt="'.$book->title.'">
                    <div class="card-body">
                        <p class="card-text">'.$book->title.'<br/>by : '.$book->author.'</p>
                        <p class="card-text">'.$book->price.'</p>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="scripts/jquery-3.3.1.slim.min.js" ></script>
    <script src="scripts/umd/popper.min.js" ></script>
    <script src="scripts/bootstrap.min.js"></script>
</body>
</html>