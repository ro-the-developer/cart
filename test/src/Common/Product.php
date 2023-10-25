<?php
declare(strict_types=1);

namespace Common;
class Product {
    protected float $price;
    public function __construct(float $price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
}
