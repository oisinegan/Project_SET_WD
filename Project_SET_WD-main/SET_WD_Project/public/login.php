
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form method="post">
        <?php
        session_start();
        if (isset($_POST['submit'])) {
            require '../dbConnection/DBconnect.php';
            if (empty($_POST['username']) || empty($_POST['password']))
            {
                $message = '<label>All fields are required</label>';
            }
            else
            {
                $sql = "SELECT * FROM customer WHERE Username =:username AND Password = :password";
               $statement = $connection->prepare($sql);
                $statement->execute(
                        array(
                                'username' => $_POST["username"],
                                'password' => $_POST["password"]
                        ));
                $count = $statement->rowCount();
                if($count > 0)
                {
                    $_SESSION["username"] = $_POST["username"];
                    header("location:login_success.php");
                }
            else
            {
                echo 'username or password is incorrect';
            }
            }

        }

        ?>


        <img class="mb-4" src="img/login.png" alt="" width="60" height="80">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="name" name="username" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <input type="submit" name="submit" value="Submit" required>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>



</body>
</html>

