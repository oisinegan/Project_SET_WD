<?php
require "templates/header.php";
require "../src/Product.php";
require "../src/transactionDetails.php";

$accessTransactionCal = new TransactionDetails();

try {
    require "../common.php";
    require_once '../dbConnection/DBconnect.php';
    $val = $_POST['idProduct'];
    $size = $_POST['size'];
    $sql1 = "SELECT * FROM Product";
    $statement1 = $connection->prepare($sql1);
    $statement1->execute();
    $result1 = $statement1->fetchAll();

}
catch(PDOException $error) {
    echo $sql1 . "<br>" . $error->getMessage();
}

if ($result1 && $statement1->rowCount() > 0) {
    foreach ($result1 as $row) {
        if ($row["idProduct"] == $val) {
            $product = new Product($row["idProduct"], $row["Admin_idAdmin"], $row["brand"], $row["price"], $row["productDescription"], $row["colour"], $row["imagePath"]);
        }
    }
    }
?>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Your Products</h1>
            </div>
        </div>
    </section>
    <form action="home.php" method="post">
    <div class="album py-5 bg-light">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="<?php echo $product->getImagePath() ?>" width="100%" height="300px">
                    <div class="card-body">
                        <p ><b>Brand:</b> <?php echo $product->getBrand() ?></p>
                        <p><b>Colour: </b> <?php echo $product->getColour() ?></p>
                        <p><b>Price: </b> <?php echo $product->getPrice() ?></p>
                        <p><b>Fit: </b> <?php echo $product->getProductDescription() ?></p>
                        <input type="hidden" name="idProduct" value="<?php echo $product->getProductID() ?>">
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Total cost: <?php echo $product->getPrice()?></h1>
                    <h1 class="fw-light">Total cost with discount: <?php echo $accessTransactionCal->discount($product->getPrice())?></h1>
                    <p class="lead text-muted">10% discount applies if you spend over 100!  </p>
                </div>
            </div>
        </section>
        <div class="button">
            <input type="submit" value="Pay now!" id="checkout">
        </div>
    </form>
<?php
require "templates/footer.php";
?>