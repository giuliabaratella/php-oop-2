<?php
class Product
{
    protected int $price;
    // public int $sconto;
    protected int $quantity;
    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public static function getPrice()
    {
        $price = rand(5, 200);
        return $price;
    }
    public static function getQuantity()
    {
        $quantity = rand(0, 100);
        return $quantity;
    }

}
?>