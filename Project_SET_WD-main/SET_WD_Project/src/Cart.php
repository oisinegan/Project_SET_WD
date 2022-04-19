<?php

class Cart
{

    private String $cartID;
    public Product $product;

    public function getCartID(): string
    {
        return $this->cartID;
    }
    public function setCartID(string $cartID): void
    {
        $this->cartID = $cartID;
    }

    //Add product to cart / array
    public function addToCart(array &$products,Product $product, float &$totelcost):void{
        array_push($products,$product);
        $totelcost = $totelcost + $product->getPrice();
    }

    //View cart
    public function viewCart(array $products):void{
        foreach($products as $product){
            print_r($product);
        }
    }

    //edit cart
    public function editCart(array &$products, $keyToDelete,float &$totelcost):void{
         $product = $products[$keyToDelete];
        unset($products[$keyToDelete]);
        $totelcost = $totelcost - $product->getPrice();
    }

    //Total price of cart
    public function checkout(float $totalcost):void{
        print_R( "Total cost: " . $totalcost . "\n");
    }

}