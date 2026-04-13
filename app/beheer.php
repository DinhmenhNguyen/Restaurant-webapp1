<?php
session_start();
include_once 'database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'beheer') {
  header("Location: login.php");
}

// Verwijder een gerecht wanneer het formulier met delete_id is ingediend.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
  $deleteId = $_POST['delete_id'];

  // SQL-DELETE query om het gerecht uit de tabel te verwijderen.
  $sql = "DELETE FROM Gerechten WHERE id = :id";
  $statement = $pdo->prepare($sql);
  $statement->bindParam(':id', $deleteId);
  $statement->execute();

  // Herlaad de beheerpagina nadat het verwijderen is voltooid.
  header('Location: beheer.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beheer - GuangzhouFoods</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bestel.css" />
  <link rel="stylesheet" href="css/beheer.css?v=1" />
</head>

<body>

  <!-- ════════════════════════════════════════
       HEADER
  ════════════════════════════════════════ -->
  <header>
    <div class="header-inner">
      <a href="bestel.php" class="logo">廣州 <span>Guangzhou Foods</span></a>
      <div class="header-actions">
        <a href="uitloggen.php" class="btn-secondary" style="font-size:0.85rem; padding:0.5rem 1.1rem;">Log uit</a>
      </div>
    </div>
  </header>

  <!-- ════════════════════════════════════════
       BEHEER PANEEL
  ════════════════════════════════════════ -->
  <section id="beheer-section">
    <div class="beheer-header">
      <h2>🛠 Beheer paneel</h2>
    </div>

    <!-- Tab navigatie verwijderd (alleen content zichtbaar) -->
    <div class="beheer-content">
      <div style="background: #e8f5e8; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border-left: 4px solid #4caf50;">
        ✅ <strong>Beheer paneel werkt!</strong> De pagina laadt succesvol.
      </div>

      <!-- ── MENU BEHEER ── -->
      <div id="panel-menu">
        <p style="font-size:0.88rem; color:var(--grey); margin-bottom:1.2rem;">
          Overzicht van alle gerechten. Gebruik het formulier hieronder om een gerecht toe te voegen.
        </p>

        <!-- Bestaande gerechten (statisch overzicht) -->
        <div class="items-grid">
          <?php
          // Eenvoudige SQL query om alle gerechten op te halen
          $sql = "SELECT * FROM Gerechten";

          // Bereid de SQL statement voor
          $statement = $pdo->prepare($sql);

          // Voer de query uit
          $statement->execute();


          // Haal alle resultaten op als een array van arrays
          $gerechten = $statement->fetchAll();

          foreach ($gerechten as $gerecht) {
            $id = $gerecht['id'];
            $naam = $gerecht['naam'];
            $beschrijving = $gerecht['beschrijving'];
            $prijs = $gerecht['prijs'];
            $afbeelding = $gerecht['foto'];

            // Controleer of er een afbeelding is opgegeven
            if ($afbeelding == "") {
              // Als er geen afbeelding is komt deze placeholder afbeelding
              $afbeelding = "https://via.placeholder.com/400x300?text=Geen+Afbeelding";
            } else {
              // Als er wel een afbeelding is krijgt het de afbeelding van de database
              $afbeelding = $afbeelding;
            }

            // Structuur van de eet kaartjes
            echo "<div class='item-card'>";
            echo "<img class=item-img src='$afbeelding' alt='$naam' class='card-img'>";
            echo "<div class='item-body'>";
            echo "<h3>$naam</h3>";
            echo "<p>$beschrijving</p>";
            echo "<div class='item-footer'>";
            echo "<span class='item-price'>€ $prijs<a href='gerechtaanpassen.php?id=$id' class='btn-item-action btn-edit' title='Bewerken'>✏️</a>";
            echo "<form method='post' style='display:inline; margin:0; padding:0;'>";
            echo "<input type='hidden' name='delete_id' value='$id'>";
            echo "<button type='submit' class='btn-item-action btn-delete' title='Verwijderen' onclick=\"return confirm('Weet je zeker dat je dit gerecht wilt verwijderen?');\">🗑</button>";
            echo "</form>";
            echo "</span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }

          // Einde van PHP code blok
          ?>
        </div>

        <div class="add-form-box">
          <a href="gerechttoevoegen.php" class="btn-primary">➕ Nieuw gerecht toevoegen</a>
        </div>
      </div><!-- einde beheer-content -->
  </section><!-- einde #beheer-section -->

</body>

</html>