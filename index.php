<?php
// Connect to database
require('includes/dbConnect.php');

// Get last 5 articles
$viewData = [];
$request = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
$viewData['articlesList'] = $request->fetchAll();
$request->closeCursor();

// Display view
$viewData['displayCommentsLink'] = true;
require('views/indexView.php');