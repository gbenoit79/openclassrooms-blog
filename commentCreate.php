<?php
// Connect to database
include("includes/dbConnect.php");

// Create comment
$articleId = isset($_POST['articleId']) ? (int) $_POST['articleId'] : 0;
$request = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
$request->execute(array($articleId, $_POST['auteur'], $_POST['commentaire']));

// Redirect to comments list page
header('Location: commentList.php?articleId='.$articleId);