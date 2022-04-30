    <?php
require '../src/User.php';
require '../src/Admin.php';
require '../src/Customer.php';
require '../src/Product.php';
require '../src/Cart.php';
require '../src/Transaction.php';
require '../src/TransactionDetails.php';
require '../src/Profile.php';

//Reads in from Product,Customer, Admin, Transaction tables from databse
try {
    require "../common.php";
    require_once '../dbConnection/DBconnect.php';
    $sql = "SELECT * FROM Product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    $sql1 = "SELECT * FROM Customer";
    $statement1 = $connection->prepare($sql1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    $sql2 = "SELECT * FROM Admin";
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    $sql3 = "SELECT * FROM Transaction";
    $statement3 = $connection->prepare($sql3);
    $statement3->execute();
    $result3 = $statement3->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

//Loop through the product database and uses the constructor to take in the data and create product objects
if ($result && $statement->rowCount() > 0) {
    foreach ($result as $row) {
        if($row["idProduct"] == '5') {
            $product1 = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"], $row["imagePath"]);
        }
        else if($row["idProduct"] == '2'){
            $product2 = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"], $row["imagePath"]);
        }
        else if($row["idProduct"] == '3'){
            $product3 = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"], $row["imagePath"]);
        }

    }
}

//Loop through the Customer database and uses the constructor to take in the data and create a customer object
if ($result1 && $statement1->rowCount() > 0) {
    foreach ($result1 as $row) {
        if($row["idCustomer"] == '2') {
            $customer = new Customer($row["idCustomer"],$row["Username"],$row["Email"],$row["Password"],$row["Street"],$row["Town"],$row["County"],$row["Postcode"],$row["Cardtype"],$row["Cardnumber"],$row["CardSecurity"]);
        }

    }
}

//Loop through the Admin database and uses the constructor to take in the data and create an Admin object
if ($result2 && $statement2->rowCount() > 0) {
    foreach ($result2 as $row) {
        if($row["idAdmin"] == '1') {
            $admin = new Admin($row["idAdmin"],$row["username"],$row["password"]);
        }

    }
}

//Loop through the Transaction database and uses the constructor to take in the data and create an Transaction object
if ($result3 && $statement3->rowCount() > 0) {
    foreach ($result3 as $row) {
        if($row["TransactionID"] == '3') {
            $transaction = new Transaction($row["TransactionID"],$row["Customer_idCustomer"],$row['TransactionDate'],$row['TransactionDate']);
        }
    }
}
print "\nCustomer \n******** \n";
print $customer;
print "\n\nAdmin \n******** \n";
print $admin;
print "\n";

//Cart
$totalcost = 0.0;
$accessCart = new Cart();
$cart = array();

$accessCart -> addToCart($cart, $product1,$totalcost);
$accessCart -> addToCart($cart, $product2,$totalcost);
$accessCart -> addToCart($cart, $product3,$totalcost);
print "\nCart \n******** \n";
$accessCart -> viewCart($cart);
print "\nTotal cost of cart with 3 different products \n******** \n";
$accessCart->checkout($totalcost);
$accessCart->editCart($cart,1,$totalcost);
print "\nCart after removing product using editCart method \n******** \n";
$accessCart -> viewCart($cart);
print "\nTotal cost of cart after removing 1 product \n******** \n";
$accessCart->checkout($totalcost);


//Transaction Details
$transactionDetails = new TransactionDetails($transaction, $cart);

//Calulate total cost of transaction
print "\n";
print "\nFinal cost of cart after applying 10% discount \n******** \n";
$finalAmount =$transactionDetails->discount($totalcost);
$costAfterDiscount = round($finalAmount,2);
print "Total cost: " . $costAfterDiscount;
print "\n" . $transactionDetails;







