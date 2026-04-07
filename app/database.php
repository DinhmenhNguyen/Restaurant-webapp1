<?php
// Database server instellingen
$host = 'db';                // Hostnaam van de database server
$db = 'mydatabase';          // Database naam
$user = 'user';              // Database gebruiker
$password = 'password';      // Wachtwoord voor database gebruiker
$charset = 'utf8mb4';        // Tekenset die Unicode ondersteunt

// PDO opties voor veilige en consistente databaseverbinding.
$opties = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // Gooi exceptions bij fouten
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Haal resultaten op als associative array
  PDO::ATTR_EMULATE_PREPARES => false,              // Gebruik echte prepared statements
];

try {
  // Maak de PDO verbinding aan met de opgegeven instellingen.
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password, $opties);
} catch (PDOException $e) {
  // Foutmelding als verbinden mislukt.
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>