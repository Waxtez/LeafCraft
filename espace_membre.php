<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}
?>
<h2>Bienvenue dans l'espace membre !</h2>
<p><a href='logout.php'>Se déconnecter</a></p>