<?php
require 'config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: espace_membre.php");
        exit;
    } else {
        echo "<p>Identifiants incorrects.</p>";
    }
}
?>
<form method="post">
  <h2>Connexion</h2>
  <input name="username" placeholder="Nom d'utilisateur" required><br>
  <input name="password" type="password" placeholder="Mot de passe" required><br>
  <button type="submit">Se connecter</button>
</form>
<p>Pas encore inscrit ? <a href='inscription.php'>Créer un compte</a></p>