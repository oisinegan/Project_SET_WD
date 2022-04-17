<?php
require '../src/User.php';
require '../src/Customer.php';
require '../src/Product.php';
require '../src/Admin.php';
require '../src/Transaction.php';
require '../src/Profile.php';

try {
    require "../common.php";
    require_once '../dbConnection/DBconnect.php';
    //Customer
    $sql = "SELECT * FROM Customer";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    //Product
    $sql1 = "SELECT * FROM Product";
    $statement1 = $connection->prepare($sql1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    //Admin
    $sql2 = "SELECT * FROM Admin";
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    //Transaction
    $sql3 = "SELECT * FROM Transaction";
    $statement3 = $connection->prepare($sql3);
    $statement3->execute();
    $result3 = $statement3->fetchAll();

    //Profiles
    $sql4 = "SELECT * FROM Profile";
    $statement4 = $connection->prepare($sql4);
    $statement4->execute();
    $result4 = $statement4->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

print "\nCustomers \n*****\n";
if ($result && $statement->rowCount() > 0) {
    foreach ($result as $row) {
        $Customer = new Customer($row["idCustomer"],$row["Username"],$row["Email"],$row["Password"],$row["Street"],$row["Town"],$row["County"],$row["Postcode"],$row["Cardtype"],$row["Cardnumber"],$row["CardSecurity"]);
        print $Customer;
        print "\n";
    }
}

print "\nProducts \n*****\n";
if ($result1 && $statement1->rowCount() > 0) {
    foreach ($result1 as $row) {
        $product = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"]);
        print $product;
        print "\n";
    }
}

print "\nAdmins \n*****\n";
if ($result2 && $statement2->rowCount() > 0) {
    foreach ($result2 as $row) {
        $admin = new Admin($row["idAdmin"],$row["username"],$row["password"]);
        print $admin;
        print "\n";
    }
}

print "\nTransactions \n*****\n";
if ($result3 && $statement3->rowCount() > 0) {
    foreach ($result3 as $row) {
        $transaction = new Transaction($row["TransactionID"],$row["Customer_idCustomer"],$row['TransactionDate'],$row['TransactionDate']);
        print $transaction;
        print "\n";
    }
}

print "\nProfiles \n*****\n";
if ($result4 && $statement4->rowCount() > 0) {
    foreach ($result4 as $row) {
        $profile = new Profile($row["profileID"],$row["Customer_idCustomer"],$row['PrevTransactions']);
        print $profile;
        print "\n";
    }
}



