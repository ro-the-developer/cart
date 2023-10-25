<?php
declare(strict_types=1);

namespace Redesign;
class Product {
    protected $price;
    public function __construct($price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
}
