<?php
// Connect to database
require('includes/dbConnect.php');

// Get article
$viewData = [];
$articleId = isset($_GET['articleId']) ? (int) $_GET['articleId'] : 0;
$request = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$request->execute(array($articleId));
$viewData['article'] = $request->fetch();
$request->closeCursor();

// Get comments
$request = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$request->execute(array($articleId));
$viewData['commentsList'] = $request->fetchAll();
$request->closeCursor();

// Display view
require('views/commentListView.php');