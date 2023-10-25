<?php
declare(strict_types=1);

namespace Redesign;

class Cart implements iCart
{
    protected array $items;

    protected Client $client;

    protected SimpleMailer $mailer;

    public function __construct(Client $client, SimpleMailer $mailer)
    {
        $this->client = $client;
        $this->mailer = $mailer;
    }

    public function add(Product $item)
    {
        $this->items[] = $item;
    }

    public function notify()
    {
        $price = $this->calcPrice();
        $text = "<p>В корзине имеются товары на сумму $price руб.</p>";
        $this->mailer->sendToManagers($text);
    }

    public function calcVat()
    {
        $vat = 0;
        foreach ($this->items as $item) {
            $vat += $item->getPrice() * $this->client->getVat();
        }
        return $vat;
    }

    public function makeOrder(float $discount = 1): Order
    {
        $price = $this->calcPrice($discount);
        $order = new Order($this->items, $price, $this->mailer);
        $order->notify();
        return $order;
    }
    protected function calcPrice(float $discount = 1): float {
        $price = 0;
        foreach ($this->items as $item) {
            $price += $item->getPrice() * (1 + $this->client->getVat()) * $discount;
        }
        return $price;
    }
}
