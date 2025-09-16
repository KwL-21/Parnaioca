<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../config/');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db   = $_ENV['DB_NAME'];

$con = mysqli_connect($host, $user, $pass);
mysqli_select_db($con, $db);