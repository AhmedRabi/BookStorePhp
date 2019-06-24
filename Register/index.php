<!doctype html>
<html lang="en">

<head>
    <title>Register Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/bootstrap.min.css" >
    <link rel="stylesheet" href="../styles/style.css" />
</head>

<body>
    <section id="register">
        <div class="layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h3 class="text-white">Register</h3>
                        <div class="card text-white">
                            <form method="POST" action="Register.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" type="text" placeholder="e.g. Ahmed Rabi" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email" type="text" placeholder="e.g. ahmed@test.com" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="mobile" id="mobile" type="text" placeholder="e.g. 01111111111" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" id="password" type="password" placeholder="Enter your Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" name="ConPassword" id="ConPassword" type="password" placeholder="Confirm Password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <input type="submit" class="btn-lg btn-primary" value="Register" />
                                </div>

                            </form>
                            <a class="btn btn-info" href="../index.php">Log in </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../scripts/jquery-3.3.1.slim.min.js" ></script>
    <script src="../scripts/umd/popper.min.js" ></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>
</html>