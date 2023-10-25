<?php
declare(strict_types=1);
namespace Refactoring;

interface iCart
{
    public function calcVat();
    public function notify();
    public function makeOrder($discount = 1.0);
}
