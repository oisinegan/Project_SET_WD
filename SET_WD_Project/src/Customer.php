<?php

class Customer extends User
{
    //Details
    private String $custID;
    private String $email;
    //Adress
    private String $street;
    private String $town;
    private String $county;
    private String $postcode;
    //Payment
    private String $cardType;
    private String $cardNumber;
    private String $cardSecurityNumber;

    /* Multiple constructors:
        Construct2 = Details
        Construct1 = Details, Address
        Construct = Details, Address, Payment
    */
    public function __construct(string $custID, string $username, String $email, String $password, String $street,  String $town,  String $county,  String $postcode, String $cardType, String $cardNumber, String $cardSecurityNumber){
        $this->username = $username;
        $this->password = $password;
        $this->custID = $custID;
        $this->email = $email;
        $this->street = $street;
        $this->town = $town;
        $this->county = $county;
        $this->postcode = $postcode;
        $this->cardType = $cardType;
        $this->cardNumber = $cardNumber;
        $this->cardSecurityNumber = $cardSecurityNumber;
    }
    public function __construct2(string $username, string $password, String $custID, String $email){
        $this->username = $username;
        $this->password = $password;
        $this->custID = $custID;
        $this->email = $email;
    }
    public function __construct1(string $username, string $password, String $custID, String $email, String $street,  String $town,  String $county,  String $postcode){
        $this->username = $username;
        $this->password = $password;
        $this->custID = $custID;
        $this->email = $email;
        $this->street = $street;
        $this->town = $town;
        $this->county = $county;
        $this->postcode = $postcode;
    }


    //Getters and setters / Update info
    public function getCustID(): string
    {
        return $this->custID;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getStreet(): string
    {
        return $this->street;
    }
    public function getTown(): string
    {
        return $this->town;
    }
    public function getCounty(): string
    {
        return $this->county;
    }
    public function getPostcode(): string
    {
        return $this->postcode;
    }
    public function getCardType(): string
    {
        return $this->cardType;
    }
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }
    public function getCardExpiry(): string
    {
        return $this->cardExpiry;
    }
    public function getCardSecurity(): string
    {
        return $this->cardSecurityNumber;
    }
    public function setCustID(string $custID): void
    {
        $this->custID = $custID;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }
    public function setTown(string $town): void
    {
        $this->town = $town;
    }
    public function setCounty(string $county): void
    {
        $this->county = $county;
    }
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }
    public function setCardType(string $cardType): void
    {
        $this->cardType = $cardType;
    }
    public function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }
    public function setCardExpiry(string $cardExpiry): void
    {
        $this->cardExpiry = $cardExpiry;
    }
    public function setCardSecurity(string $cardSecurityNumber): void
    {
        $this->cardSecurityNumber = $cardSecurityNumber;
    }


    public function signUp(): void{}
    public function logIn(): void{}

    public function __toString(){
        return "Username: ". $this->username. ", Password: ".  $this->username . ", Email: " . $this->email. ", CustID: ".  $this->custID. ", Address: ".  $this->street . ", " . $this->town . ", " . $this->county . ", " . $this->postcode . ", Card type: " . $this->cardType . ", Card number: " . $this->cardNumber . ", Card Security: " . $this->cardSecurityNumber;
    }

}