<?php
declare(strict_types=1);

namespace Common;
class SimpleMailer {
    public function __construct(string $login, string $pass) {
    }
    public function sendToManagers(string $text) {
        var_dump($text);
    }
}
