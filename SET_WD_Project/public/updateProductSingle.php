<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "../common.php";
if (isset($_POST['submit'])) {
    try {
        require_once '../dbConnection/DBconnect.php';
 $product =[
     "idProduct" => $_POST['idProduct'],
     "Admin_idAdmin" => $_POST['Admin_idAdmin'],
     "brand" => $_POST['brand'],
     "price" => $_POST['price'],
     "productDescription" => $_POST['productDescription'],
     "colour" => $_POST['colour'],
     "imagePath" => $_POST['imagePath']
 ];
 $sql = "UPDATE Product
 SET idProduct = :idProduct,
      brand = :brand,
     price = :price,
 productDescription = :productDescription,
 colour = :colour,
     Admin_idAdmin = :Admin_idAdmin,
 imagePath = :imagePath
 WHERE idProduct = :idProduct";
 $statement = $connection->prepare($sql);
 $statement->execute($product);
 } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_GET['id'])) {
    try {
        require_once '../dbConnection/DBconnect.php';
 $id = $_GET['id'];
 $sql = "SELECT * FROM Product WHERE idProduct = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':id', $id);
 $statement->execute();
 $product = $statement->fetch(PDO::FETCH_ASSOC);
 } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>
<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['brand']); ?> runner successfully updated.
<?php endif; ?>
<div class="container">

<h2>Edit Product</h2>
<form method="post">
    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
    <?php foreach ($product as $key => $value) : ?>
        <div class="col-12">
        <label for="<?php echo $key; ?>" class="form-label"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" class="form-control"  id="<?php echo $key;
        ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ?
            'readonly' : null); ?>>
        </div>
    <?php endforeach; ?>
            <hr class="my-4">
    <input class="w-100 btn btn-primary btn-lg" type="submit" name="submit" value="Submit">
        </div>
    </div>
</form>
<a href="updateProduct.php">Back to current products</a>
</div>
<?php require "templates/footer.php"; ?>

