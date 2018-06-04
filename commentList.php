<?php
// Connect to database
require_once('includes/dbConnect.php');

// Instantiate article service
require_once('models/ArticleService.php');
$articleService = new ArticleService($databaseHandler);

// Instantiate comment service
require_once('models/CommentService.php');
$commentService = new CommentService($databaseHandler);

// Get article
$viewData = [];
$articleId = isset($_GET['articleId']) ? (int) $_GET['articleId'] : 0;
$viewData['article'] = $articleService->getArticle($articleId);

// Get comments
$viewData['commentsList'] = $commentService->getCommentsList($articleId);

// Display view
require_once('views/commentListView.php');