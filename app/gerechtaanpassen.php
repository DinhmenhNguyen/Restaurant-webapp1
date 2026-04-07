<?php
include_once 'database.php';

$_GET['id'];

$sql = "SELECT * FROM Gerechten";

// Bereid de SQL statement voor
$statement = $pdo->prepare($sql);
// Voer de query uit
$statement->execute();
// Haal alle resultaten op als een array van arrays
$gerechten = $statement->fetchAll();





?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerecht aanpassen</title>
  <link rel="stylesheet" href="css/gerechtaanpassen.css">
</head>
<body>
  <main class="form-wrapper">
    <h1>Gerecht bewerken</h1>
    <p>Gebruik dit formulier om de gegevens van het bestaande gerecht aan te passen. Alleen HTML en CSS zijn hier toegevoegd.</p>

    <form action="" method="post">
      <div class="field-group">
        <label>
          Naam gerecht
          <input type="text" name="naam" placeholder="Bijv. Pasta Bolognese" required>
        </label>

        <label>
          Omschrijving
          <textarea name="omschrijving" placeholder="Beschrijf het gerecht" required></textarea>
        </label>

        <label>
          Prijs
          <input type="number" name="prijs" step="0.01" min="0" placeholder="€ 12,50" required>
        </label>

        <label>
          Afbeelding URL
          <input type="url" name="afbeelding" placeholder="https://example.com/afbeelding.jpg">
        </label>
      </div>

      <div class="button-row">
        <button type="button">Annuleren</button>
        <button type="submit">Aanpassen</button>
      </div>
    </form>
  </main>
</body>
</html>