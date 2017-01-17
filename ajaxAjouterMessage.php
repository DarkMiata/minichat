<?php
session_start(); // connexion à la session
$pseudo = $_SESSION['pseudo'];

$message = $_POST['message'];

// Ajoute en BDD

$bdd = new PDO("mysql:host=localhost;dbname=chat", "root", "");

$statement = $bdd->prepare(
    "INSERT INTO chattab(message, pseudo, dateheure)"
    . "VALUES(:msg, :pseudo, NOW())");

$statement->execute( array("msg"=>$message, "pseudo"=>$pseudo ) );
?>

<html>
    <script type="text/javascript">
        $('#msg').val() = "";
    </script>
</html>
