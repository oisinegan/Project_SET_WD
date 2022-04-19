<?php
require "../src/User.php";
require "../src/Customer.php";

$custCount = 0;
try {

    require_once '../dbConnection/DBconnect.php';
    //Customer
    $sql1 = "SELECT * FROM Customer";
    $statement1 = $connection->prepare($sql1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();
}
catch(PDOException $error) {
    echo $sql1 . "<br>" . $error->getMessage();
}
if ($result1 && $statement1->rowCount() > 0) {
    foreach ($result1 as $row) {
        $custCount = $custCount +1;
    }
}

if (isset($_POST['submit'])) {
    require "../common.php";
    require '../src/Product.php';
    try {
        require_once '../dbConnection/DBconnect.php';
        //Create Product object to store input from 'create new product; form
        $customer = new Customer($custCount + 1,$_POST["username"],$_POST["email"],$_POST["password"],$_POST["street"],$_POST["town"],$_POST["county"],$_POST["postcode"],$_POST["cardType"],$_POST["cardNumber"],$_POST["cardSecurity"]);
        //Use Getters to place product information into an array (So it can be executed)
        $new_customer = array(
            "idCustomer" => $customer->getCustID(),
            "Username" => $customer->getUsername(),
            "Email" => $customer->getEmail(),
            "Password" => $customer->getPassword(),
            "Street" => $customer->getStreet(),
            "Town" => $customer->getTown(),
            "County" => $customer->getCounty(),
            "Postcode" => $customer->getPostcode(),
            "Cardtype" => $customer->getCardType(),
            "Cardnumber" => $customer->getCardnumber(),
            "CardSecurity" => $customer->getCardSecurity(),
        );
        //Sql statement to add product information into database
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "Customer",
            implode(", ", array_keys($new_customer)),
            ":" . implode(", :", array_keys($new_customer)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_customer);
        header("location:login.php");
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>


<?php require "templates/headerSignIn.php" ?>


    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Create an Account</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">General details</h4>
                    <form action="" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Name" value="" required>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password <span class="text-muted"></span></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                            </div>
                            <h4 class="mb-3"></h4>
                            <h4 class="mb-3">Address details</h4>

                            <div class="col-12">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" class="form-control" name="street" id="street" placeholder="1234 Main St" required>
                            </div>

                            <div class="col-12">
                                <label for="town" class="form-label">Town<span class="text-muted"></span></label>
                                <input type="text" class="form-control" name="town" id="town" placeholder="Apartment or suite" required>
                            </div>

                            <div class="col-md-5">
                                <label for="county" class="form-label">County</label>
                                <input type="text" class="form-control" name="county" id="county" placeholder="Meath" required>
                            </div>


                            <div class="col-md-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="A12 DV46" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment Details</h4>

                        <div class="col-12">
                            <label class="form-check-label" for="credit">Card type</label>
                            <input id="credit" name="cardType" type="text" class="form-control"  required>
                        </div>



                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                            </div>

                            <div class="col-md-6">
                                <label for="cardNumber" class="form-label">Card number</label>
                                <input type="text" class="form-control" name="cardNumber" id="cardNumber" placeholder="" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            </div>

                            <div class="col-md-3">
                                <label for="cardSecurity" class="form-label">CVV</label>
                                <input type="text" class="form-control" name="cardSecurity" id="cardSecurity" placeholder="" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" value="submit">Create account</button>
                    </form>
                </div>
            </div>
        </main>


    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


<?php require "templates/footer.php" ?>