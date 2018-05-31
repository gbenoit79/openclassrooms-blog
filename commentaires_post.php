<?php
// Connexion à la base de données
include("includes/bdd.php");

// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
$req->execute(array($_POST['billet'], $_POST['auteur'], $_POST['commentaire']));

// Redirection du visiteur vers la page des commaentaires
header('Location: commentaires.php?billet=' . $_POST['billet']);