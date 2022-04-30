
<?php require 'templates/header.php' ?>
<?php require '../src/User.php'; ?>

<?php require '../src/Customer.php'; ?>

<?php

try {
require "../common.php";
require_once '../dbConnection/DBconnect.php';
$sql = "SELECT * FROM Customer";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

if ($result && $statement->rowCount() > 0) {
    foreach ($result as $row) {
        if($row['Username'] == $_SESSION['username']) {
            $customer = new Customer($row["idCustomer"],$row["Username"],$row["Email"],$row["Password"],$row["Street"],$row["Town"],$row["County"],$row["Postcode"],$row["Cardtype"],$row["Cardnumber"],$row["CardSecurity"]);
        }

    }
}

?>

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="img/login.png" alt=""  width="100" height="100">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Information</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="Username">Username</label>
                        <?php echo $customer->getUsername();
                        ?>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Email address</label>
                                <?php echo $customer->getEmail();
                                ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Town</label>
                            <?php echo $customer->getTown();
                            ?>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Street</label>
                                <?php echo $customer->getStreet();
                                ?>
                            </div>
                            <!-- Form Group (location)-->
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="Email">County</label>
                            <?php echo $customer->getCounty();
                            ?>
                        </div>

                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">

                            <div class="mb-3">
                                <label class="small mb-1" for="">Card type</label>
                                <?php echo $customer->getCardType();
                                ?>
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="">Card Number</label>
                                <?php echo $customer->getCardNumber();
                                ?>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="">Card Security</label>
                                <?php echo $customer->getCardSecurity();
                                ?>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "templates/footer.php";