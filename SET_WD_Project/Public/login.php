<?php
/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */
if (isset($_POST['submit'])) {
    try {
        require "./common.php";
        require_once './src/DBconnect.php';
        $sql = "SELECT *
 FROM Customer
 WHERE username = :username";
        $username = $_POST['username'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "templates/header.php";
if (isset($_POST['submit'])) {
if ($result && $statement->rowCount() > 0) {
?>
<h2>Results</h2>
<table>
    <thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) { ?>
    <tr>
        <td><?php echo escape($row["username"]); ?></td>
        <td><?php echo escape($row["email"]); ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    > No results found for <?php echo escape($_POST['username']); ?>.
<?php }
} ?>
<h2>Find user based on Username and password</h2>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <input type="submit" name="submit" value="View Results">
</form>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>
