<?php 
    require '../Helper/Helper.php';
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
    <title>Admin List</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="../logout.php">logout</span></a>
                </li>
            </ul>
           
        </div>
    </nav>
    <div class="container" style="padding-top:5em">
        <div class="row">
            <div class="py-3">
              <a href="Create" class="btn btn-primary">Add New Book</a>
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($books as $book){
                        echo '<tr>
                        <td>'.$book->title.'</td>
                        <td>'.$book->author.'</td>
                        <td>'.$book->price.'</td>
                        <td>'.$book->category.'</td>
                        <td><a href="Edit/index.php?id='.$book->id.'" class="btn btn-info">Edit</a>
                        <a href="Delete/index.php?id='.$book->id.'" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>    
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="scripts/jquery-3.3.1.slim.min.js" ></script>
    <script src="scripts/umd/popper.min.js" ></script>
    <script src="scripts/bootstrap.min.js"></script>
</body>
</html>