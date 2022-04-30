<?php
/**
 * Delete a user
 */
require "../common.php";
if (isset($_GET["idProduct"])) {
    try {
        require_once '../dbConnection/DBconnect.php';
 $id = $_GET["idProduct"];
 $sql = "DELETE FROM Product WHERE idProduct = :id";
 $statement = $connection->prepare($sql);
 $statement->bindValue(':idProduct', $id);
 $statement->execute();
 $success = "User successfully deleted";

} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}
    header("Location: updateProductSingle.php");
}
try {
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
<h2>Delete Product</h2>
<?php /* if ($success) echo $success; */ ?>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Admin_idAdmin</th>
        <th>brand</th>
        <th>price</th>
        <th>productDescription</th>
        <th>colour</th>
        <th>imagePath</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["idProduct"]); ?></td>
            <td><?php echo escape($row["Admin_idAdmin"]); ?></td>
            <td><?php echo escape($row["brand"]); ?></td>
            <td><?php echo escape($row["price"]); ?></td>
            <td><?php echo escape($row["productDescription"]); ?></td>
            <td><?php echo escape($row["colour"]); ?></td>
            <td><?php echo escape($row["imagePath"]); ?> </td>
            <td><a href="deleteProduct.php?id=<?php echo escape($row["idProduct"]);
                ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="home.php">Back to home</a>
<?php require "templates/footer.php"; ?>