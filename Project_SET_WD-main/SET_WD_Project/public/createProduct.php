<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    require '../src/Product.php';
    try {
        require_once '../dbConnection/DBconnect.php';
        //Create Product object to store input from 'create new product; form
        $product = new Product($_POST['idProduct'],$_POST['Admin_idAdmin'],$_POST['brand'],$_POST['price'],$_POST['productDescription'],$_POST['colour']);
        //Use Getters to place product information into an array (So it can be executed)
        $new_product = array(
            "idProduct" => $product->getProductID(),
            "Admin_idAdmin" => $product->getAdminID(),
            "brand" => $product->getBrand(),
            "price" => $product->getPrice(),
            "productDescription" => $product->getProductDescription(),
            "colour" => $product->getColour(),
        );
        //Sql statement to add product information into database
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "Product",
            implode(", ", array_keys($new_product)),
            ":" . implode(", :", array_keys($new_product)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_product);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<!-- Link to stylesheet-->
<link rel="stylesheet" href="css/style.css" />
<form method="post">
    <h1>Create a product</h1>
    <?php if (isset($_POST['submit']) && $statement) { ?>
        <?php echo escape($_POST['idProduct']); ?> successfully added.
    <?php } ?>

    <label for="idProduct">Product ID</label>
    <input type="text" name="idProduct" id="idProduct" required>
    <label for="Admin_idAdmin">Admin ID</label>
    <input type="text" name="Admin_idAdmin" id="Admin_idAdmin" required>
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand" required>
    <label for="price">Price</label>
    <input type="text" name="price" id="price" required>
    <label for="productDescription">Product description</label>
    <input type="text" name="productDescription" id="productDescription" required>
    <label for="colour">Colour</label>
    <input type="text" name="colour" id="colour" required>
    <!--Submit-->
    <input type="submit" name="submit" value="Submit" required>
</form>

