<?php
try {
    require "../src/Product.php";
    require "../src/Cart.php";
    require "../common.php";
    require_once '../dbConnection/DBconnect.php';

    //Cart
    $totalcost = 0.0;
    $accessCart = new Cart();
    $cart = array();

//Product
    $sql = "SELECT * FROM Product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
}
catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
?>

<?php
/*Cart code - needs to be fixed only adding last product to cart*/
if(isset($_POST["submitButton"])) {
try {
//Product
    $sql = "SELECT * FROM Product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
}
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

    $idVal = $_POST['idProduct'];
    if ($result && $statement->rowCount() > 0) {
        foreach ($result as $row) {
            if($row["idProduct"]==$_POST['idProduct']) {
                $product1 = new Product($row["idProduct"], $row["Admin_idAdmin"], $row["brand"], $row["price"], $row["productDescription"], $row["colour"], $row["imagePath"]);
            }
        }
    }
$accessCart->addToCart($cart,$product1,$totalcost);
}
?>
<?php require "templates/header.php" ?>
<title>Products</title>
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Current Products</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </section>
    <form action="checkout.php" method="post">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php
                if ($result && $statement->rowCount() > 0) {
                     foreach ($result as $row) {
                        $product = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"],$row["imagePath"]);
            ?>
                <form action="" method="post">
                         <div class="col">
                             <div class="card shadow-sm">

                                 <img src="<?php echo $product->getImagePath() ?>" width="100%" height="300px">
                                 <div class="card-body">
                                     <p ><b>Brand:</b> <?php echo $product->getBrand() ?></p>
                                     <p><b>Colour: </b> <?php echo $product->getColour() ?></p>
                                     <p><b>Price: </b> <?php echo $product->getPrice() ?></p>

                                     <label for="size" class="sizeLabel" ><b>Size:</b></label>
                                     <input type="number" name="size" id="size" class="size" min="1">

                                     <input type="hidden" name="idProduct" value="<?php echo $product->getProductID() ?>">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <div class="btn-group">
                                             <button type="submit" name="submitButton" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                </form>
                 <?php
                    }
                }
            ?>
    </div>
    </form>

    <?php
        if(sizeof($cart)>0){

    ?>
            <center><h1>Cart</h1></center>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="card shadow-sm">
                    <img src="<?php echo $product1->getImagePath() ?>" width="100%" height="300px">
                    <div class="card-body">
                        <p><b>Brand:</b> <?php echo $product1->getBrand() ?></p>
                        <p><b>Colour: </b> <?php echo $product1->getColour() ?></p>
                        <p><b>Price: </b> <?php echo $product1->getPrice() ?></p>
                        <input type="hidden" name="idProduct" value="<?php echo $product1->getProductID() ?>">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Checkout" id="checkout">
                </div>
            </div>
            </div>
            </div>

    <?php
        }
    ?>
</main>

<?php require "templates/footer.php" ?>




