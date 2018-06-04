<?php
// Connect to database
require('includes/dbConnect.php');

// Instantiate article service
require('models/ArticleService.php');
$articleService = new ArticleService($databaseHandler);

// Instantiate comment service
require('models/CommentService.php');
$commentService = new CommentService($databaseHandler);

// Get article
$viewData = [];
$articleId = isset($_GET['articleId']) ? (int) $_GET['articleId'] : 0;
$viewData['article'] = $articleService->getArticle($articleId);

// Get comments
$viewData['commentsList'] = $commentService->getCommentsList($articleId);

// Display view
require('views/commentListView.php');