<?php
declare(strict_types=1);
namespace Refactoring;

class Order {
    protected $id;
    public function __construct($items, $price) {
        $this->items = $items;
        $this->price = $price;
        $this->id = 1;
    }
    public function getId(): int {
        return $this->id;
    }
    public function getPrice(): float {
        return $this->price;
    }
}
