<?php
declare(strict_types=1);

use Common\Config;
use Common\Product;
use Common\SimpleMailer;
use Redesign\Cart;
use Redesign\Client;

require __DIR__.'/src/autoload.php';

$mailer = new SimpleMailer(Config::MAILER['login'], Config::MAILER['password']);

$cart = new Cart(new Client(0.18), $mailer);
$cart->add(new Product(100));
$cart->add(new Product(200));

echo "НДС: ", $cart->calcVat(), "\n";
echo "Cart::notify(): ";
$cart->notify();
echo "Cart::makeOrder(): ";
$order = $cart->makeOrder(0.5);
echo "Сумма: ", $order->getPrice();
