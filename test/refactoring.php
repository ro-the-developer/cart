<?php
declare(strict_types=1);

use Refactoring\Cart;
use Refactoring\Product;

require __DIR__.'/src/autoload.php';

$cart = new Cart();
$cart->items[] = new Product(100);
$cart->items[] = new Product(200);

echo "НДС: ", $cart->calcVat(), "\n";
echo "Cart::makeOrder(): ";
$cart->makeOrder(0.5);
echo "Сумма: ", $cart->order->getPrice();
