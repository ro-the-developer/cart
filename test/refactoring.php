<?php
require __DIR__.'/src/autoload.php';
use Refactoring\Cart;
use Refactoring\Product;

$cart = new Cart();
$cart->items[] = new Product(100);
$cart->items[] = new Product(200);

echo "НДС: ", $cart->calcVat(), "\n";
$cart->makeOrder(0.5);
echo "Цена:", $cart->order->getPrice();
