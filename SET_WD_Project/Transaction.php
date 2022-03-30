<?php

class Transaction
{
    private String $transactionID;
    private String $transactionDate;
    private String $deliveryDate;
    private String $custID;

    public function __construct(string $transactionID, string $transactionDate, string $deliveryDate, string $custID)
    {
        $this->transactionID = $transactionID;
        $this->transactionDate = $transactionDate;
        $this->deliveryDate = $deliveryDate;
        $this->custID = $custID;
    }

    //Getter and setters
    public function getTransactionID(): string
    {
        return $this->transactionID;
    }
    public function setTransactionID(string $transactionID): void
    {
        $this->transactionID = $transactionID;
    }
    public function getTransactionDate(): string
    {
        return $this->transactionDate;
    }
    public function setTransactionDate(string $transactionDate): void
    {
        $this->transactionDate = $transactionDate;
    }
    public function getDeliveryDate(): string
    {
        return $this->deliveryDate;
    }
    public function setDeliveryDate(string $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }
    public function getCustID(): string
    {
        return $this->custID;
    }
    public function setCustID(string $custID): void
    {
        $this->custID = $custID;
    }


    public function __toString(){
        return "Transaction: TransactionID: ". $this->transactionID . ", Transaction date: " . $this->transactionDate. ", delivery date: ". $this->deliveryDate . ", custID: ". $this->custID;
    }



}