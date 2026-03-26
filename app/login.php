<?php
// Inclusief database connectie bestand
include_once 'database.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - GuangzhouFoods</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bestel.css" />
  <link rel="stylesheet" href="css/login.css" />
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
       LOGIN SCHERM
  ════════════════════════════════════════ -->
  <section id="login-section">
    <div class="login-box">
      <p class="login-logo">廣州 <span class="title-login">GuangzhouFoods</span></p>
      <h2>Medewerkers Login</h2>
      <p>Voer uw gebruikersnaam en wachtwoord in</p>

      <!--
        Puur HTML/CSS login:
        Er is geen server-side verificatie mogelijk zonder JS/backend.
        Dit formulier stuurt naar het beheer-scherm via een anker.
        In productie koppel je dit aan een backend (PHP, Node, etc.)
      -->
      <form action="#beheer-section" method="get">
        <div class="form-group">
          <label for="login-user">Gebruikersnaam</label>
          <input type="text" id="login-user" name="user" placeholder="gebruikersnaam" required />
        </div>
        <div class="form-group">
          <label for="login-pass">Wachtwoord</label>
          <input type="password" id="login-pass" name="pass" placeholder="••••••••" required />
        </div>
        <button type="submit" class="btn-primary" style="width:100%; padding:0.8rem;">
          Inloggen
        </button>
      </form>
    </div>
  </section>


  <!-- ════════════════════════════════════════
       BEHEER PANEEL (via :target)
  ════════════════════════════════════════ -->
  <section id="beheer-section">
    <div class="beheer-header">
      <h2>🛠 Beheer paneel</h2>
      <a href="bestel.php" class="btn-secondary" style="font-size:0.85rem;">← Terug naar bestellen</a>
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
            <h4>Loempia (6 stuks)</h4>
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