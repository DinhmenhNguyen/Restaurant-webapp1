<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GuangzhouFoods</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bestel.css" />
  <link rel="stylesheet" href="css/bestel-inline.css" />
</head>

<body>


  <!-- ════════════════════════════════════════
       HEADER
  ════════════════════════════════════════ -->
  <header>
    <div class="header-inner">
      <input type="checkbox" id="nav-toggle" class="nav-toggle-input">
      <a href="index.php" class="logo">廣州 <span>Guangzhou Foods</span></a>
      <label for="nav-toggle" class="header__hamburger" aria-label="Menu openen">☰</label>
      <div class="header-actions">
        <a href="login.php" class="btn-primary" style="font-size:0.85rem; padding:0.5rem 1.1rem;">🔑 Login</a>
      </div>
    </div>
  </header>


  <!-- ════════════════════════════════════════
       HOOFDPAGINA — BESTELGEDEELTE
  ════════════════════════════════════════ -->
  <div id="bestel-sectie">
    <main>

      <!-- ── LINKER KOLOM: MENU ── -->
      <section class="menu-section">

        <div class="menu-hero">
          <h1>Kies jouw gerecht</h1>
          <p>Vers bereid, snel bezorgd — of haal af bij ons restaurant.</p>
        </div>

        <form name="zoek-formulier" action="bestel.php" method="GET" class="search-form">
          <label for="zoek-input">Zoek jouw favoriete gerecht</label>
          <div class="search-input-group">
            <input type="text" id="zoek-input" name="zoek" placeholder="Bv. nasi goreng, dim sum, loempia...">
            <button type="submit">🔍 Zoeken</button>
            <a href="bestel.php" class="reset-button" title="Wis zoekopdracht en toon alle gerechten">🔄 Alle gerechten</a>
          </div>
        </form>

        <div class="items-grid">
          <?php
          // Controleert of er een variabele is en dat deze niet leeg is
          $hasUserSearched = isset($_GET['zoek']) && $_GET['zoek'] !== "";

          if ($hasUserSearched) {
            $searchString = $_GET['zoek'];
            $searchStringWildCard = "%" . $searchString . "%";

            // Dit Selecteert alle dingen van Gerechten
            $sql = "SELECT * FROM Gerechten WHERE naam LIKE :zoek1 OR beschrijving LIKE :zoek2";

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
            echo "<span class='item-price'>€ $prijs</span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }

          // Einde van PHP code blok
          ?>
        </div>
      </section><!-- einde menu-section -->

    </main>
  </div><!-- einde #bestel-sectie -->
  </section><!-- einde #beheer-section -->

</body>

</html>