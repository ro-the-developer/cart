<?php
declare(strict_types=1);

namespace Redesign;
class SimpleMailer {
    public function __construct($login, $pass) {
    }
    public function sendToManagers($text) {
        var_dump($text);
    }
}
