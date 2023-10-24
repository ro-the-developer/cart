<?php
namespace Refactoring;

class SimpleMailer {
    public function __construct($login, $pass) {
    }
    public function sendToManagers($text) {
        var_dump($text);
    }
}
