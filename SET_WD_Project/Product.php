<?php

class Product
{
    private String $productID;
    private String $brand;
    private float $size;
    private float $price;
    private String $productDescription;
    private String $colour;
    //Include specialized options here

    public function __construct(string $productID, string $brand, float $size, float $price, string $productDescription, string $colour){
        $this->productID = $productID;
        $this->brand = $brand;
        $this->size = $size;
        $this->price = $price;
        $this->productDescription = $productDescription;
        $this->colour = $colour;
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
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    public function getSize(): float
    {
        return $this->size;
    }
    public function setSize(float $size): void
    {
        $this->size = $size;
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

    //Filter by size
    public function filterSize():void{}

    //Filter by brand
    public function filterBrand():void{}

    //sort products
    public function sortProduct(): void{}

    public function __toString(){
        return "Product: productID: ". $this->productID. ", brand: ".  $this->brand;
    }




}