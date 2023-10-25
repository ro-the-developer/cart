<?php
declare(strict_types=1);

namespace Redesign;
use Common\SimpleMailer;

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
