<?php
declare(strict_types=1);

namespace Redesign;

class Client
{
    protected $vat;
    public function __construct($vat)
    {
        $this->vat = $vat;
    }
    public function getVat()
    {
        return $this->vat;
    }
}