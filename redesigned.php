<?php

interface iCart
{
    public function calcVat();
    public function add(Product $item);
    public function makeOrder(float $discount = 1.0);
}

interface iOrder
{
    public function notify();
}

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

class Order implements iOrder {
    protected int $id;

    protected float $price;

    protected SimpleMailer $mailer;

    public function __construct($items, $price, $mailer) {
        $this->items = $items;
        $this->price = $price;
        $this->mailer = $mailer;
        $this->id = 1;
    }

    public function getId() {
        return $this->id;
    }
    public function getPrice() {
        return $this->price;
    }
    public function notify()
    {
        $text = "<p>Оформлен заказ № <b>$this->id</b> на сумму $this->price руб.</p>";
        $this->mailer->sendToManagers($text);
    }
}


