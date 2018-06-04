<?php
// Connect to database
require_once('includes/dbConnect.php');

// Instantiate article service
require_once('models/ArticleService.php');
$articleService = new ArticleService($databaseHandler);

// Get last 5 articles
$viewData = [];
$viewData['articlesList'] = $articleService->getArticlesList(5);

// Display view
$viewData['displayCommentsLink'] = true;
require_once('views/indexView.php');