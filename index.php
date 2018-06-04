<?php
// Connect to database
require('includes/dbConnect.php');

// Instantiate article service
require('models/ArticleService.php');
$articleService = new ArticleService($databaseHandler);

// Get last 5 articles
$viewData = [];
$viewData['articlesList'] = $articleService->getArticlesList(5);

// Display view
$viewData['displayCommentsLink'] = true;
require('views/indexView.php');