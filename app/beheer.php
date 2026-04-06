<?php
// Vereenvoudigde versie zonder database voorlopig
include_once 'database.php';
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
        <a href="bestel.php" class="btn-secondary" style="font-size:0.85rem; padding:0.5rem 1.1rem;">← Terug naar bestellen</a>
      </div>
    </div>
  </header>

  <!-- ════════════════════════════════════════
       BEHEER PANEEL
  ════════════════════════════════════════ -->
  <section id="beheer-section">
    <div class="beheer-header">
      <h2>🛠 Beheer paneel</h2>
      <a href="bestel.php" class="btn-secondary" style="font-size:0.85rem;">← Terug naar bestellen</a>
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
          // Controleert of er een variabele is en dat deze niet leeg is
          $hasUserSearched = isset($_GET['zoek']) && $_GET['zoek'] !== "";

          if ($hasUserSearched) {
            $searchString = $_GET['zoek'];
            $searchStringWildCard = "%" . $searchString . "%";

            // Dit Selecteert alle dingen van Gerechten
            $sql = "SELECT * FROM Gerechten WHERE naam LIKE :zoek1 OR beschrijving LIKE :zoek2";

            // Bereid de SQL statement voor met PDO
            // PDO = het connectie van database tot php
            $statement = $pdo->prepare($sql);

            // De waardes $searchStringWildCard aan zoek1 en 2 binden
            $statement->bindParam(':zoek1', $searchStringWildCard);
            $statement->bindParam(':zoek2', $searchStringWildCard);

            // Voer de query uit
            $statement->execute();

          } else {
            // Eenvoudige SQL query om alle gerechten op te halen
            $sql = "SELECT * FROM Gerechten";

            // Bereid de SQL statement voor
            $statement = $pdo->prepare($sql);

            // Voer de query uit
            $statement->execute();
          }

          // Haal alle resultaten op als een array van arrays
          $gerechten = $statement->fetchAll();

          foreach ($gerechten as $gerecht) {
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
            echo "<span class='item-price'>€ $prijs<button>E</button><button>X</button></span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }

          // Einde van PHP code blok
          ?>
        </div>


      <!-- ── RESTAURANT INFO ── -->
      <div id="panel-info" style="display:none;">
        <form action="mailto:info@guangzhoufoods.nl" method="post" enctype="text/plain">
          <div class="form-group">
            <label>Restaurantnaam</label>
            <input type="text" name="naam" value="Guangzhou Foods" />
          </div>
          <div class="form-group">
            <label>Openingstijden</label>
            <input type="text" name="openingstijden" value="Ma–Vr: 11:00–22:00 | Za–Zo: 12:00–23:00" />
          </div>
          <div class="form-group">
            <label>Bezorgkosten (€)</label>
            <input type="number" name="bezorgkosten" value="2.50" step="0.10" />
          </div>
          <div class="form-group">
            <label>Min. bestelbedrag (€)</label>
            <input type="number" name="minimum" value="15.00" step="0.50" />
          </div>
          <div class="form-group">
            <label>Bezorggebied (postcodes)</label>
            <input type="text" name="postcodes" placeholder="bv. 3011, 3012, 3013" />
          </div>
          <button type="submit" class="btn-primary">Wijzigingen doorsturen</button>
        </form>
      </div>


      <!-- ── MEDEWERKERS ── -->
      <div id="panel-users" style="display:none;">
        <p style="font-size:0.88rem; color:var(--grey); margin-bottom:1.2rem;">
          Huidig personeel met toegang tot het beheer paneel.
        </p>

        <div class="beheer-item">
          <span class="beheer-item-emoji">👤</span>
          <div class="beheer-item-info">
            <h4>eigenaar</h4>
            <span>⭐ Eigenaar — volledige toegang</span>
          </div>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">👤</span>
          <div class="beheer-item-info">
            <h4>chef</h4>
            <span>Chef-kok — menu beheer</span>
          </div>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">👤</span>
          <div class="beheer-item-info">
            <h4>medewerker</h4>
            <span>Medewerker — bestellingen inzien</span>
          </div>
        </div>

        <!-- Nieuw account aanvragen -->
        <div class="add-form-box">
          <h4>➕ Nieuw account aanvragen</h4>
          <form action="mailto:info@guangzhoufoods.nl" method="post" enctype="text/plain">
            <div class="form-row">
              <div class="form-group">
                <label for="new-user">Gebruikersnaam</label>
                <input type="text" id="new-user" name="gebruikersnaam" placeholder="naam" required />
              </div>
              <div class="form-group">
                <label for="new-role">Rol</label>
                <input type="text" id="new-role" name="rol" placeholder="bv. Medewerker" />
              </div>
            </div>
            <button type="submit" class="btn-primary">Aanvraag versturen</button>
          </form>
        </div>
      </div>

    </div><!-- einde beheer-content -->
  </section><!-- einde #beheer-section -->

</body>

</html>