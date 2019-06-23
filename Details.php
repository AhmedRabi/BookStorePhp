<?php  
    require 'Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
       $dbm = new DataBaseManger();
       if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id ."<br/>".gettype($id);
    }
      $book = $dbm->getBookbyID($id);
    }else{
        Header("Location: ../../Login");
    }  
    
?>

<!doctype html>
<html lang="en">

<head>
    <title><?php $book->title?></title>
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
                <?php if(isset($_SESSION["isAdmin"])||isset($_COOKIE["isAdmin"])){
                    echo '<li class="nav-item active">
                    <a class="nav-link" href="../index.php">Admin</a>
                </li> ';
                }?> 
                <li class="nav-item active">
                    <a class="nav-link" href="../Logout.php">Logout</span></a>
                </li>
            </ul>
           
        </div>
    </nav>
    <div class="container py-5" >
        <div class="row">
            <div class="col-md-2">
                <img src="<?php echo"http://".$_SERVER["HTTP_HOST"]."/BookstorePhp/Helper".$book->photo;?>" class="img-fluid" alt="<?php echo $book->title?>">
            </div>
            <div class="col-md-10">
               <dl class="row">
                   <dt class="col-md-3">Title<dt>
                    <dd class="col-md-9"><?php echo $book->title;?></dd>
              
               
                   <dt class="col-md-3">Author<dt>
                    <dd class="col-md-9"><?php echo $book->author;?></dd>
              
             
                   <dt class="col-md-3">Price<dt>
                    <dd class="col-md-9"><?php echo $book->price;?></dd>
              
              
                   <dt class="col-md-3">Category<dt>
                    <dd class="col-md-9"><?php echo $book->category;?></dd>
               </dl>
             
                <div class="row py-3">
                    <div class="col-md-2">
                        <a href="index.php" class="btn btn-success text-light">Back to List </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="scripts/jquery-3.3.1.slim.min.js"></script>
        <script src="scripts/umd/popper.min.js"></script>
        <script src="scripts/bootstrap.min.js"></script>
</body>
</html>