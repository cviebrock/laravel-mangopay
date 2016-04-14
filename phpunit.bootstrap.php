<?php

if (!file_exists(__DIR__ . '/.env')) {
    die("You need to create a .env file with your Mangopay credentials!\n");
}

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
