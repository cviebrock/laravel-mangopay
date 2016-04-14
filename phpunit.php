<?php

if (!file_exists(__DIR__ . '/.test.env')) {
    die("You need to create a .test.env file with your Mangopay credentials!\n");
}

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__, '.test.env');
$dotenv->load();
