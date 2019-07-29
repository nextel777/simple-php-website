<?php
$link = mysqli_connect("127.0.0.1", "pract", "p1n", "pract");

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "mysql error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo 'mysqli connected';


