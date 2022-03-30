<?php

class Profile{
    private User $user;
    public  $previousTransactions = array();

    public function __construct(User $user,array $previousTransactions){
        $this->user = $user;
        $this->previousTransactions = $previousTransactions;
    }

    //Getters and Setters
    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function getPreviousTransactions(): array
    {
        return $this->previousTransactions;
    }
    public function setPreviousTransactions(array $previousTransactions): void
    {
        $this->previousTransactions = $previousTransactions;
    }


    public function addTransaction(array &$previousTransactions,Transaction &$transaction):void{
        array_push($previousTransactions, $transaction);
    }

    //Print out previous transactions made by user
    public function viewPreviousTransactions(array &$transactions):void{
        foreach($transactions as $transaction){
            print_r($transaction);
        }
    }

    //Delete a specific transaction made by user
    public function deleteTransaction(array &$transaction, $keyToDelete):void{
        unset($transaction[$keyToDelete]);
    }

    //Delete all previous transactions made by user
    public function deleteAllTransactions(array &$transactions):void{
        $transactions = array();
    }





}