<?php
$link = new mysqli("127.0.0.1", "pract", "p1n", "pract");

if ($link->connect_errno) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "errno: " . $link->connect_errno() . PHP_EOL;
    echo "mysql error: " . $link->connect_error() . PHP_EOL;
    exit;
}

//echo 'mysqli connected';


