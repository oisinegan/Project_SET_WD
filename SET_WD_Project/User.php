<?php
abstract class User{
    protected String $username;
    protected String $password;


    // Getters and Setters
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    //Change current password of user
    function resetPassword(): void {}

    // Validate password
    function checkUsername(): void{}
    function checkPassword(): void{}


}
