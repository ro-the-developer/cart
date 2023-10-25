<?php
declare(strict_types=1);
namespace Refactoring;

class Cart implements iCart
{
    public array $items = [];
    public Order $order;

    public function calcVat()
    {
        $vat = 0;
        foreach ($this->items as $item) {
            $vat += $item->getPrice() * Config::VAT;
        }
        return $vat;
    }

    public function notify()
    {
        $this->sendMail();
    }

    public function sendMail()
    {
        $mailer = new SimpleMailer(Config::MAILER['login'], Config::MAILER['password']);
        // TODO: уточнить у бизнеса, точно ли надо считать без скидки
        // TODO: если нет, то использовать $this->order->getPrice()
        $price = $this->calcPrice();
        $text = "<p><b>" . $this->order->getId() . "</b> $price</p>";
        $mailer->sendToManagers($text);
    }

    protected function calcPrice($discount = 1) {
        $price = 0;
        foreach ($this->items as $item) {
            $price += $item->getPrice() * (1 + Config::VAT) * $discount;
        }
        return $price;
    }

    public function makeOrder($discount = 1.0)
    {
        $price = $this->calcPrice($discount);
        $this->order = new Order($this->items, $price);
        $this->sendMail();
    }
}
