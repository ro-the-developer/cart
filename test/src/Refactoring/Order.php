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
    public function getId() {
        return $this->id;
    }
    public function getPrice() {
        return $this->price;
    }
}
