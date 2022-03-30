<?php include "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    require "./common.php";
    try {
        require_once './src/DBconnect.php';
        $new_user = array(
            "idCustomer" => $_POST['cardNumber'],
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "street" => $_POST['street'],
            "town" => $_POST['town'],
            "county" => $_POST['county'],
            "postcode" => $_POST['postcode'],
            "cardType" => $_POST['cardType'],
            "cardNumber" => $_POST['cardNumber'],
            "cardSecurity" => $_POST['cardSecurity']
        );
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "Customer",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

    <form method="post">
        <h1>Create an Account</h1>
        <?php if (isset($_POST['submit']) && $statement) { ?>
            <?php echo escape($_POST['username']); ?> successfully added.
        <?php } ?>
        <!--General details-->
        <h2>General Details</h2>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <!--Address details-->
        <h2>Address Details</h2>
        <label for="street">Street</label>
        <input type="text" name="street" id="street" required>
        <label for="town">Town</label>
        <input type="text" name="town" id="town" required>
        <label for="county">County</label>
        <input type="text" name="county" id="county" required>
        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode" required>

        <!--Payment details-->
        <h2>Payment Details</h2>
        <label for="cardType">Card Type</label>
        <input type="text" name="cardType" id="cardType" required>
        <label for="cardNumber">Card Number</label>
        <input type="text" name="cardNumber" id="cardNumber" required>
        <label for="cardSecurity">Card Security</label>
        <input type="text" name="cardSecurity" id="cardSecurity" required>

        <!--Submit-->
        <input type="submit" name="submit" value="Submit" required>
    </form>
    <a href="index.php">Back to home</a>
<?php include "templates/footer.php"; ?>