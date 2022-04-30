<?php

class Product
{
    private String $productID;
    private String $adminID;
    private String $brand;
    private float $price;
    private String $productDescription;
    private String $colour;
    private String $imagePath;

    public function __construct(string $productID, String $adminID, string $brand, float $price, string $productDescription, string $colour,String $imagePath){
        $this->productID = $productID;
        $this->adminID = $adminID;
        $this->brand = $brand;
        $this->price = $price;
        $this->productDescription = $productDescription;
        $this->colour = $colour;
        $this->imagePath = $imagePath;
    }
    public function __construct1(){ }

    //Getter and setters / update info
    public function getProductID(): string
    {
        return $this->productID;
    }
    public function setProductID(string $productID): void
    {
        $this->productID = $productID;
    }
    public function getAdminID(): string
    {
        return $this->adminID;
    }
    public function setAdminID(string $adminID): void
    {
        $this->adminID = $adminID;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function getProductDescription(): string
    {
        return $this->productDescription;
    }
    public function setProductDescription(string $productDescription): void
    {
        $this->productDescription = $productDescription;
    }
    public function getColour(): string
    {
        return $this->colour;
    }
    public function setColour(string $colour): void
    {
        $this->colour = $colour;
    }
    public function getImagePath(): string
    {
        return $this->imagePath;
    }
    public function setImagePath(string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }


    //Filter by size
    public function filterSize():void{}

    //Filter by brand
    public function filterBrand():void{}

    //sort products
    public function sortProduct(): void{}

    public function __toString(){
        return "ProductID: ". $this->productID. ", brand: ".  $this->brand  . ", price: " . $this->price . ", fit: " . $this->productDescription . ", colour: " . $this->colour . ", Added/updated by: ".$this->adminID . ", Image Path = " . $this->imagePath;
    }




}