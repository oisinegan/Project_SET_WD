<?php

class Admin extends User{
    private String $adminID;

    public function __construct(string $username, string $password, String $adminID){
        $this->username = $username;
        $this->password = $password;
        $this->adminID = $adminID;
    }

    //Getters and setters
    public function getAdminID(): string
    {
        return $this->adminID;
    }
    public function setAdminID(string $adminID): void
    {
        $this->adminID = $adminID;
    }

    public function deleteProduct(): void{}
    public function updateProduct(): void{}
    public function updatePrice(): void{}
    public function updateName(): void{}

    public function __toString(){
        return "Admin: Username: ". $this->username. ", Password: ".  $this->username . ", AdminID: " . $this->adminID;
    }


}