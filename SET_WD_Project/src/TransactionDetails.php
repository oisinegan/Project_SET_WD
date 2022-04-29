<?php

class TransactionDetails
{
    private Transaction $transaction;
    private $cart = array();
    private float $cost;

    public function __construct(){

    }

    //Checkout - Calculate total price of items combined
    public function __construct1(Transaction $transaction, array &$cart)
    {
        $this->transaction = $transaction;
        $this->cart = $cart;
    }

    //check if transaction is valid for discount and calculate
    public function discount(float $price):float{
        if($price>=100){
            $price = $price*.9;

        }
        return $price;
    }

    public function __toString(){
        return "Transaction number: " . $this->transaction->getTransactionID();
    }

}