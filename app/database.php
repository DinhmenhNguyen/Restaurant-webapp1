<?php
$host = 'db';
$db = 'mydatabase';
$user = 'user';
$password = 'password';
$charset = 'utf8mb4';

$opties = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password, $opties);
  echo "werkt";
} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  echo "niet";
}
?>