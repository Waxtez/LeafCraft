<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        echo "<p>Nom d'utilisateur déjà pris.</p>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        echo "<p>Compte créé ! <a href='connexion.php'>Connecte-toi</a></p>";
    }
}
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Inscription - LeafCraft</title>
  <link href='https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='style.css'>
</head>
<body>
  <nav class='navbar'>
    <div class='container nav-content'>
      <div class='logo'>LeafCraft</div>
      <ul class='nav-links'>
        <li><a href='index.html'>Accueil</a></li>
        <li><a href='vote.html'>Vote</a></li>
        <li><a href='boutique.html'>Boutique</a></li>
        <li><a href='connexion.html'>Connexion</a></li>
      </ul>
    </div>
  </nav>
  <section class='auth-section'>
    <div class='container auth-container'>
      <h1>Créer un compte</h1>
      <form method='post'>
        <label for='username'>Nom d'utilisateur</label>
        <input name='username' id='username' required><br>
        <label for='password'>Mot de passe</label>
        <input type='password' name='password' id='password' required><br>
        <button type='submit'>Créer un compte</button>
      </form>
    </div>
  </section>
</body>
</html>
