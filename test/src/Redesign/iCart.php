<?php
declare(strict_types=1);

namespace Redesign;

use Common\Product;
interface iCart
{
    public function calcVat();
    public function add(Product $item);
    public function makeOrder(float $discount = 1.0);
}
