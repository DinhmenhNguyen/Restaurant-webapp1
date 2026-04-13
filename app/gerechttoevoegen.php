<?php
session_start();
include_once 'database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'beheer') {
  header("Location: login.php");
}

// Berichten die we later kunnen tonen in de HTML
$successMessage = '';
$errorMessage = '';

// Controleer of het formulier is verstuurd met POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Haal waarden uit het POST-formulier op, of gebruik een standaardwaarde
    $naam = $_POST['naam'] ?? '';
    $omschrijving = $_POST['omschrijving'] ?? '';
    $prijs = $_POST['prijs'] ?? 0;
    $afbeelding = $_POST['afbeelding'] ?? '';
    $type = $_POST['type'] ?? '';

    // SQL-query om een nieuw gerecht toe te voegen aan de database
    $sql = "INSERT INTO Gerechten (naam, beschrijving, prijs, foto, type) VALUES (:naam, :beschrijving, :prijs, :foto, :type)";

    // Bereid de statement voor met PDO om SQL-injectie te voorkomen
    $statement = $pdo->prepare($sql);

    // Bind de formulierwaarden aan de SQL-parameters
    $statement->bindParam(':naam', $naam);
    $statement->bindParam(':beschrijving', $omschrijving);
    $statement->bindParam(':prijs', $prijs);
    $statement->bindParam(':foto', $afbeelding);
    $statement->bindParam(':type', $type);

    // Voer de query uit en voeg het gerecht toe
    $statement->execute();
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerecht toevoegen</title>
    <link rel="stylesheet" href="css/gerechttoevoegen.css" />
</head>

<body>
    <main class="page-wrapper">
        <div class="header-bar">
            <a href="beheer.php" class="btn-secondary">← Terug naar beheer</a>
            <h1>Nieuw gerecht toevoegen</h1>
        </div>

        <section class="form-card">
            <?php if ($successMessage): ?>
                <div style="background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; padding: 12px 16px; margin-bottom: 16px; color: #155724;">
                    ✅ <?php echo $successMessage; ?> Teruggaan naar beheer...
                </div>
            <?php elseif ($errorMessage): ?>
                <div style="background: #f8d7da; border: 1px solid #f5c6cb; border-radius: 8px; padding: 12px 16px; margin-bottom: 16px; color: #721c24;">
                    ❌ <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="naam">Naam gerecht</label>
                    <input type="text" id="naam" name="naam" placeholder="Bijv. Kung Pao Kip" required />
                </div>

                <div class="form-group">
                    <label for="omschrijving">Omschrijving</label>
                    <textarea id="omschrijving" name="omschrijving" placeholder="Korte beschrijving van het gerecht" rows="4" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="prijs">Prijs (€)</label>
                        <input type="number" id="prijs" name="prijs" placeholder="12.50" step="0.01" min="0" required />
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" id="type" name="type" placeholder="Bijv. Starter, Hoofdgerecht" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="afbeelding">Afbeelding URL</label>
                        <input type="text" id="afbeelding" name="afbeelding" placeholder="https://voorbeeld.com/afbeelding.jpg" />
                    </div>
                </div>

                <button type="submit" class="btn-primary">Gerecht toevoegen</button>
            </form>
        </section>
    </main>
</body>

</html>