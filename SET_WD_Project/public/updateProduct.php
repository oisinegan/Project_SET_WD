<?php

require "../src/product.php";
/**
 * List all users with a link to edit
 */
try {
    require "../common.php";
    require_once '../dbConnection/DBconnect.php';
    $sql = "SELECT * FROM Product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/headerAdmin.php"; ?>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Update Products</h1>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <tbody>
    <?php foreach ($result as $row){
    $product = new Product($row["idProduct"],$row["Admin_idAdmin"],$row["brand"],$row["price"],$row["productDescription"],$row["colour"],$row["imagePath"]);
    ?>
    <div class="col">
        <div class="card shadow-sm">
            <form action="" method="post">
                <img src="<?php echo $product->getImagePath() ?>" width="100%" height="300px">
                <div class="card-body">
                    <p><b>Id: </b> <?php echo $product->getProductID() ?></p>
                    <p><b>Brand:</b> <?php echo $product->getBrand() ?></p>
                    <p><b>Colour: </b> <?php echo $product->getColour() ?></p>
                    <p><b>Price: </b> <?php echo $product->getPrice() ?></p>
                    <p><b>Admin Id: </b> <?php echo $product->getAdminID() ?></p>
                    <p><b>Image path: </b> <?php echo $product->getImagePath() ?></p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                        </div>

                    </div>
                    <div class="btn-group">
                        <a href="updateProductSingle.php?id=<?php echo escape($row["idProduct"]); ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                    </div>
                </div>
        </div>
    </div>
    <?php } ?>
        </div>
    </div>
</main>