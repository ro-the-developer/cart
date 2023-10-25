<?php
declare(strict_types=1);

namespace Redesign;

interface iCart
{
    public function calcVat();
    public function add(Product $item);
    public function makeOrder(float $discount = 1.0);
}
