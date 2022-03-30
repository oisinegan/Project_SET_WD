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
    private String $cardExpiry;
    private String $cardSecurityNumber;

    /* Multiple constructors:
        Construct = Details
        Construct1 = Details, Address
        Construct2 = Details, Address, Payment
    */
    public function __construct(string $username, string $password, String $custID, String $email){
       /* parent::__construct($username, $password); */
        $this->username = $username;
        $this->password = $password;
        $this->custID = $custID;
        $this->email = $email;
    }
    public function __construct1(string $username, string $password, String $custID, String $email, String $street,  String $town,  String $county,  String $postcode){
        parent::__construct($username, $password);
        $this->custID = $custID;
        $this->email = $email;
        $this->street = $street;
        $this->town = $town;
        $this->county = $county;
        $this->postcode = $postcode;
    }
    public function __construct2(string $username, string $password, String $custID, String $email, String $street,  String $town,  String $county,  String $postcode, String $cardType, String $cardNumber, String $cardExpiry, String $cardSecurityNumber){
        parent::__construct($username, $password);
        $this->custID = $custID;
        $this->email = $email;
        $this->street = $street;
        $this->town = $town;
        $this->county = $county;
        $this->postcode = $postcode;
        $this->cardType = $cardType;
        $this->cardNumber = $cardNumber;
        $this->cardExpiry = $cardExpiry;
        $this->cardSecurityNumber = $cardSecurityNumber;
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
    public function getCardSecurityNumber(): string
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
    public function setCardSecurityNumber(string $cardSecurityNumber): void
    {
        $this->cardSecurityNumber = $cardSecurityNumber;
    }

    public function checkEmail():void{}

    //Should these be here or in profile class??
    public function signUp(): void{}
    public function logIn(): void{}

    public function __toString(){
        return "Customer: Username: ". $this->username. ", Password: ".  $this->username . ", Email: " . $this->email. ", CustID: ".  $this->custID;
    }







}