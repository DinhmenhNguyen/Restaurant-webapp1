<?php
// Start van PHP code blok aan het begin van het bestand

// Inclusief het database.php bestand dat de database connectie bevat
// include_once zorgt ervoor dat het bestand maar één keer wordt geladen, ook al wordt het meerdere keren aangeroepen
include_once 'database.php';

// Einde van de initiële PHP code, nu volgt HTML
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


  <!-- ════════════════════════════════════════
       BEHEER PANEEL (via :target)
  ════════════════════════════════════════ -->
  <section id="beheer-section">
    <div class="beheer-header">
      <h2>🛠 Beheer paneel</h2>
      <a href="#bestel-sectie" class="btn-secondary" style="font-size:0.85rem;">← Terug naar bestellen</a>
    </div>

    <!-- Tab navigatie verwijderd (alleen content zichtbaar) -->
    <div class="beheer-content">

      <!-- ── MENU BEHEER ── -->
      <div id="panel-menu">
        <p style="font-size:0.88rem; color:var(--grey); margin-bottom:1.2rem;">
          Overzicht van alle gerechten. Gebruik het formulier hieronder om een gerecht toe te voegen.
        </p>

        <!-- Bestaande gerechten (statisch overzicht) -->
        <div class="beheer-item">
          <span class="beheer-item-emoji">🥟</span>
          <div class="beheer-item-info">
            <h4>Dim Sum (6 stuks)</h4>
            <span>Starters · Gestoomde dumplings met dipsaus</span>
          </div>
          <span class="beheer-item-prijs">€ 8,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🥗</span>
          <div class="beheer-item-info">
            <h4>Komkommersalade</h4>
            <span>Starters · Met sesamolie en verse knoflook</span>
          </div>
          <span class="beheer-item-prijs">€ 5,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍢</span>
          <div class="beheer-item-info">
            <h4>Loempia (2 stuks)</h4>
            <span>Starters · Knapperige loempia met zoetzure saus</span>
          </div>
          <span class="beheer-item-prijs">€ 6,00</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍜</span>
          <div class="beheer-item-info">
            <h4>Bami Goreng</h4>
            <span>Hoofdgerechten · Gebakken noedels</span>
          </div>
          <span class="beheer-item-prijs">€ 10,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍚</span>
          <div class="beheer-item-info">
            <h4>Nasi Goreng</h4>
            <span>Hoofdgerechten · Gebakken rijst met ei</span>
          </div>
          <span class="beheer-item-prijs">€ 10,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🦐</span>
          <div class="beheer-item-info">
            <h4>Garnalen oestersaus</h4>
            <span>Hoofdgerechten · Verse garnalen</span>
          </div>
          <span class="beheer-item-prijs">€ 14,95</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍗</span>
          <div class="beheer-item-info">
            <h4>Peking Eend</h4>
            <span>Hoofdgerechten · Krokante eend</span>
          </div>
          <span class="beheer-item-prijs">€ 18,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🥦</span>
          <div class="beheer-item-info">
            <h4>Roerbakgroenten</h4>
            <span>Vegetarisch · Seizoensgroenten</span>
          </div>
          <span class="beheer-item-prijs">€ 9,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍄</span>
          <div class="beheer-item-info">
            <h4>Tofu met paddenstoelen</h4>
            <span>Vegetarisch · In gembersaus</span>
          </div>
          <span class="beheer-item-prijs">€ 11,00</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🧋</span>
          <div class="beheer-item-info">
            <h4>Bubble Tea Taro</h4>
            <span>Dranken · Met tapiocaparels</span>
          </div>
          <span class="beheer-item-prijs">€ 5,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🧋</span>
          <div class="beheer-item-info">
            <h4>Bubble Tea Matcha</h4>
            <span>Dranken · Romige matcha met tapiocaparels</span>
          </div>
          <span class="beheer-item-prijs">€ 5,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🧋</span>
          <div class="beheer-item-info">
            <h4>Bubble Tea Aardbei</h4>
            <span>Dranken · Fruitig en fris</span>
          </div>
          <span class="beheer-item-prijs">€ 5,50</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🧋</span>
          <div class="beheer-item-info">
            <h4>Bubble Tea Brown Sugar</h4>
            <span>Dranken · Melkthee met bruine suiker</span>
          </div>
          <span class="beheer-item-prijs">€ 6,00</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍵</span>
          <div class="beheer-item-info">
            <h4>Groene Thee</h4>
            <span>Dranken · Traditionele Chinese groene thee</span>
          </div>
          <span class="beheer-item-prijs">€ 3,00</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍵</span>
          <div class="beheer-item-info">
            <h4>Jasmijn Thee</h4>
            <span>Dranken · Licht geparfumeerde groene thee</span>
          </div>
          <span class="beheer-item-prijs">€ 3,00</span>
        </div>

        <div class="beheer-item">
          <span class="beheer-item-emoji">🍵</span>
          <div class="beheer-item-info">
            <h4>Oolong Thee</h4>
            <span>Dranken · Halfgefermenteerde thee</span>
          </div>
          <span class="beheer-item-prijs">€ 3,50</span>
        </div>

        <!-- Toevoegformulier — stuurt via mailto naar eigenaar -->
        <div class="add-form-box">
          <h4>➕ Nieuw gerecht aanvragen</h4>
          <p style="font-size:0.82rem; margin-bottom:1rem;">
            Vul het formulier in. De aanvraag wordt per e-mail verzonden naar de eigenaar.
          </p>
          <form action="mailto:info@guangzhoufoods.nl" method="post" enctype="text/plain">
            <div class="form-row">
              <div class="form-group">
                <label for="new-naam">Naam gerecht</label>
                <input type="text" id="new-naam" name="naam" placeholder="Gerecht naam" required />
              </div>
              <div class="form-group">
                <label for="new-prijs">Prijs (€)</label>
                <input type="number" id="new-prijs" name="prijs" placeholder="0.00" step="0.01" required />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="new-cat">Categorie</label>
                <input type="text" id="new-cat" name="categorie" placeholder="bv. Starters" />
              </div>
              <div class="form-group">
                <label for="new-emoji">Emoji</label>
                <input type="text" id="new-emoji" name="emoji" placeholder="🍽" />
              </div>
            </div>
            <div class="form-group">
              <label for="new-desc">Beschrijving</label>
              <input type="text" id="new-desc" name="beschrijving" placeholder="Korte omschrijving" />
            </div>
            <button type="submit" class="btn-primary">Aanvraag versturen</button>
          </form>
        </div>
      </div><!-- einde panel-menu -->


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