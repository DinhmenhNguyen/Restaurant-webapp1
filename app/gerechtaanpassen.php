<?php
include_once 'database.php';

$gerechtId = $_GET['id'];

$sql = "SELECT * FROM Gerechten WHERE id = :id";


// Bereid de SQL statement voor
$statement = $pdo->prepare($sql);

$statement->bindParam(':id', $gerechtId);
// Voer de query uit
$statement->execute();
// Haal alle resultaten op als een array van arrays
$gerecht = $statement->fetch();

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
          <input type="text" name="naam" required value="<?php echo $gerecht['naam']; ?>">
        </label>

        <label>
          Omschrijving
          <textarea name="omschrijving" required><?php echo $gerecht['beschrijving'];?></textarea>
        </label>

        <label>
          Prijs
          <input type="number" name="prijs" step="0.01" min="0" required value="<?php echo $gerecht['prijs']; ?>">
        </label>

        <label>
          Afbeelding URL
          <input type="text" name="afbeelding" value="<?php echo $gerecht['foto']; ?>">
        </label>
      </div>

      <div class="button-row">
        <a href="beheer.php">Annuleren</a>
        <input type="submit">Aanpassen</input>
      </div>
    </form>
  </main>
</body>

</html>