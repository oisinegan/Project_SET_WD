
 <?php
require "../src/User.php";
require "../src/Customer.php";

$prodCount = 0;
try {

    require_once '../dbConnection/DBconnect.php';
    //Product
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
        $prodCount = $prodCount +1;
    }
}

if (isset($_POST['submit'])) {
    require "../common.php";
    require '../src/Product.php';
    try {
        require_once '../dbConnection/DBconnect.php';
        //Create Product object to store input from 'create new product; form
        $product = new Product($prodCount +1,$_POST['Admin_idAdmin'],$_POST['brand'],$_POST['price'],$_POST['productDescription'],$_POST['colour'], $_POST['imagePath']);
        //Use Getters to place product information into an array (So it can be executed)
        $new_product = array(
            "idProduct" => $product->getProductID(),
            "Admin_idAdmin" => $product->getAdminID(),
            "brand" => $product->getBrand(),
            "price" => $product->getPrice(),
            "productDescription" => $product->getProductDescription(),
            "colour" => $product->getColour(),
            'imagePath' => $product->getImagePath(),
        );
        //Sql statement to add product information into database
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "Product",
            implode(", ", array_keys($new_product)),
            ":" . implode(", :", array_keys($new_product)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_product);
        echo "added";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/headerAdmin.php" ?>

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Add a Product</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Product details</h4>
                    <form action="" method="post">
                         <?php if (isset($_POST['submit']) && $statement) { ?>
                              <?php echo escape($_POST['brand']); ?>  runner successfully added.
                        <?php } ?>

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="brand" class="form-label">Brand</label>
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Nike" value="" required>
                            </div>

                            <div class="col-12">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group has-validation">
                                    <input type="number" class="form-control" name="price" id="price" placeholder="100" min="1" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="productDescription" class="form-label">Product fit</label>
                                <input type="text" class="form-control" name="productDescription" id="productDescription" placeholder="normal fit" required>
                            </div>

                            <div class="col-12">
                                <label for="colour" class="form-label">Colour</label>
                                <input type="text" class="form-control" name="colour" id="colour" placeholder="Black" required>
                            </div>

                            <div class="col-12">
                                <label for="imagePath" class="form-label">Image Path</label>
                                <input type="text" class="form-control" name="imagePath" id="imagePath" placeholder="img/nike1.webp" required>
                            </div>

                            <div class="col-12">
                                <label for="Admin_idAdmin" class="form-label">Admin ID</label>
                                <input type="text" class="form-control" name="Admin_idAdmin" id="Admin_idAdmin" placeholder="1" required>
                            </div>



                            <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit" value="submit">Add Product</button>
                    </form>
                </div>
            </div>
        </main>


    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


<?php require "templates/footer.php" ?>