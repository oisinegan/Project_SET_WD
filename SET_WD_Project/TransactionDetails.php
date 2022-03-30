<?php

class TransactionDetails
{
    private Transaction $transaction;
    private array $cart;
    private float $cost;




    //Checkout - Calculate total price of items combined

    public function __construct(Transaction $transaction, array &$cart)
    {
        $this->transaction = $transaction;
    }





    //check if transaction is valid for discount and calculate
    public function discount(float $price):void{
        if($price>=100){
            $price = $price*.9;
        }
        print_r("Total cost of transaction after discount = " . $price);
    }

}