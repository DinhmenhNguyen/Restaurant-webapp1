<?php
// Laad de database connectie voor het ophalen en bijwerken van gerechtgegevens.
include_once 'database.php';

// Het ID van het gerecht dat moet worden aangepast, uit de URL (?id=...)
$gerechtId = $_GET['id'];

// Als het formulier is ingediend, werk dan het gerecht bij in de database.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $afbeelding = $_POST['afbeelding'];

    // SQL UPDATE query om de bestaande rij te wijzigen.
    $updatesql = "UPDATE Gerechten SET naam = :naam, beschrijving = :beschrijving, prijs = :prijs, foto = :foto WHERE id = :id";
    $statement = $pdo->prepare($updatesql);
    $statement->bindParam(':naam', $naam);
    $statement->bindParam(':beschrijving', $omschrijving);
    $statement->bindParam(':prijs', $prijs);
    $statement->bindParam(':foto', $afbeelding);
    $statement->bindParam(':id', $gerechtId);
    $statement->execute();
}

// Laad het huidige gerecht om de velden vooraf in te vullen in het formulier.
$sql = "SELECT * FROM Gerechten WHERE id = :id";

$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $gerechtId);
$statement->execute();
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
          <input type="text" name="naam" required value="<?php echo $gerecht['naam']; ?>" placeholder="Voer de naam van het gerecht in">
        </label>

        <label>
          Omschrijving
          <textarea name="omschrijving" required placeholder="Beschrijf het gerecht"><?php echo $gerecht['beschrijving'];?></textarea>
        </label>

        <label>
          Prijs
          <input type="number" name="prijs" step="0.01" min="0" required value="<?php echo $gerecht['prijs']; ?>" placeholder="0.00">
        </label>

        <label>
          Afbeelding URL
          <input type="text" name="afbeelding" value="<?php echo $gerecht['foto']; ?>" placeholder="https://voorbeeld.com/afbeelding.jpg">
        </label>
      </div>

      <div class="button-row">
        <a href="beheer.php"><i class="fas fa-times"></i> Terug</a>
        <button type="submit"><i class="fas fa-check"></i> Aanpassen</button>
      </div>
    </form>
  </main>
</body>

</html>