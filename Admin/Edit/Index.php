<?php  
    require '../../Helper/Helper.php';
    session_start();
    //check if a user logged in
    if(isset($_SESSION["username"]) || isset($_COOKIE["username"])){
       $dbm = new DataBaseManger();
       if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id ."<br/>".gettype($id);
    }
      $book = $dbm->getBookbyID($id);
      $Cats = $dbm->GetAllCategories();
    }else{
        Header("Location: Login");
    }  
   
?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit Book</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/bootstrap.min.css" >
    <link rel="stylesheet" href="../styles/style.css" />
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
                    <a class="nav-link" href="../../Logout.php">Logout</span></a>
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
                <form method="POST" action="edit.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $book->id?>" name="id" id="id" />
                    <div class="form-group row">                        
                        <label class="col-sm-3 col-form-label">Title: </label>
                        <div class="col-md-9">
                            <input name="title" id="title" type="text" value="<?php echo $book->title;?>" class="form-control" />
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author: </label>
                        <div class="col-md-9">
                            <input name="author" id="author" type="text" value="<?php echo $book->author;?>" class="form-control" />
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Price: </label>
                        <div class="col-md-9">
                            <input name="price" id="price" type="text" value="<?php echo $book->price;?>" class="form-control" />
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category: </label>
                        <div class="col-md-9">
                            <!-- <input name="category" id="category" type="text" value="<?php echo $book->category;?>" class="form-control" /> -->
                            <select name="category" id="category" class="form-control">
                                <?php
                                    foreach($Cats as $cat){
                                        if($cat->categoryName == $book->category){
                                        echo '<option value="'.$cat->id.'" selected>'.$cat->categoryName.'</option>';
                                        }else{
                                            echo '<option value="'.$cat->id.'">'.$cat->categoryName.'</option>';

                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-md-9">
                            <input type="file" multiple accept='image/*' class="form-control-file" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input type="submit" value="Edit book" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
                <div class="py-3 row">
                    <div class="col-md-2">
                        <a href="../index.php" class="btn btn-success text-light">Back to List </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../scripts/jquery-3.3.1.slim.min.js"></script>
        <script src="../scripts/umd/popper.min.js"></script>
        <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>