<!doctype html>
<html lang="en">

    <head>
        <title>Login Page</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css" />
    </head>

    <body>
        <section id="login">
            <div class="layer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <h3 class="text-white">Login</h3>
                            <div class="card text-white">
                                <form method="POST" action="login.php">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input class="form-control" name="email" id="email" type="text"
                                            placeholder="Enter your Email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input class="form-control" name="password" id="password" type="password"
                                            placeholder="Enter your Password" />
                                    </div>
                                    <div class="form-group">
                                        <input name="rememberMe" id="rememberMe" type="checkbox" checked />
                                        <label>Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p>Don't have an account ! </p>
                                    <a href="../Register/index.php">Sign up here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../scripts/jquery-3.3.1.slim.min.js"></script>
        <script src="../scripts/umd/popper.min.js"></script>
        <script src="../scripts/bootstrap.min.js"></script>
    </body>

</html>
