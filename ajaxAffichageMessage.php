<?php
// Ouverture BD
$bdd = new PDO("mysql:host=localhost;dbname=chat", "root", "");

// Recup ts msg
$reponse = $bdd->query('SELECT * FROM chattab ORDER BY dateheure')->fetchAll();

// Generer JSON correspondant
echo json_encode($reponse);
?>