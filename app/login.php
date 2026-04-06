<?php
// Inclusief database connectie bestand
include_once 'database.php';

$username = "user";
$password = "password";

if (isset($_POST["username"]) && isset($_POST["password"]) !== "") {
  if ($_POST["username"] == $username && $_POST["password"] == $password) {
    header("Location: beheer.php");
  }
}

//}

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


      <form name="login" action="login.php" method="post">
        <div class="form-group">
          <label for="login-user">Gebruikersnaam</label>
          <input method="post" type="text" id="login-user" name="username" placeholder="gebruikersnaam" required />
        </div>
        <div class="form-group">
          <label for="login-pass">Wachtwoord</label>
          <input method="post" type="password" id="login-pass" name="password" placeholder="••••••••" required />
        </div>
        <button type="submit" class="btn-primary" style="width:100%; padding:0.8rem;">
          Inloggen
        </button>
      </form>
    </div>
  </section>
</body>

</html>