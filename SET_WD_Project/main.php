<?php
require 'User.php';
require 'Admin.php';
require 'Customer.php';
require  'Product.php';
require  'Cart.php';
require  'Transaction.php';
require  'TransactionDetails.php';
require  'Profile.php';

//Customer
$customer1 = new Customer("runner165", "letmein",  "C001", "Runner123@gmail.com");
print $customer1;

print "\n";

//Admin
$admin1 = new Admin("Admin123","letmeIN","A001");
print $admin1;

print "\n";

//Products
$product1 = new Product("P001","Nike","10",120,"Made for running","Black");
$product2 = new Product("P002","Adidas","7",150,"For speedsters","white");
$product3 = new Product("P003","Nike","12",45,"Made for casual wear","Blue");

print "\n";

//Cart
$totalcost = 0.0;
$accessCart = new Cart();
$cart = array();

$accessCart -> addToCart($cart, $product1,$totalcost);
$accessCart -> addToCart($cart, $product2,$totalcost);
$accessCart -> addToCart($cart, $product3,$totalcost);
$accessCart -> viewCart($cart);
$accessCart -> editCart($cart,1,$totalcost);
$accessCart -> viewCart($cart);
$accessCart->checkout($totalcost);

//Transaction
$transaction1 = new Transaction("T001","24/03/2022","29/03/2022",$customer1->getCustID());
$transaction2 = new Transaction("T002","24/03/2022","25/03/2022",$customer1->getCustID());
print $transaction1;

//Transaction Details
$transactionDetails = new TransactionDetails($transaction1, $cart);

//Customer profile
$previousTransaction =  array();
$profile1 = new Profile($customer1,$previousTransaction);
$profile1->addTransaction($previousTransaction,$transaction1);
$profile1->addTransaction($previousTransaction,$transaction2);
//$profile1->viewPreviousTransactions($previousTransaction);
//$profile1->deleteTransaction($previousTransaction,1);
//$profile1->viewPreviousTransactions($previousTransaction);
//$profile1->deleteAllTransactions($previousTransaction);
$profile1->viewPreviousTransactions($previousTransaction);

//Calulate total cost of transaction
$transactionDetails->discount($totalcost);








