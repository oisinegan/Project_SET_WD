<?php

    require "templates/headerSignIn.php";

?>



<div class="text-center">
<div class="container">
    <!--<main class="form-signin"> -->
    <main>
    <form  class="signInForm" method="post">
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
                $sql = "SELECT * FROM Customer WHERE Username =:username AND Password = :password";
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
                    header("location:index.php");
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
        <input type="submit" name="submit" value="Sign in!" required><br><br><br>

        <h1 class="h3 mb-3 fw-normal">New User? Sign up below</h1>
        <button><a href="createCustomer.php" style="color: black">Sign up</a></button>

        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
    </main>
</div>
</div>



</body>
</html>

