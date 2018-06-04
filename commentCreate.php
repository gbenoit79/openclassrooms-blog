<?php
// Connect to database
require_once("includes/dbConnect.php");

// Instantiate comment service
require_once('models/CommentService.php');
$commentService = new CommentService($databaseHandler);

// Create comment
$articleId = isset($_POST['articleId']) ? (int) $_POST['articleId'] : 0;
$comment = new Comment();
$comment->setArticleId($articleId);
$comment->setAuthor($_POST['author']);
$comment->setContent($_POST['content']);
$commentService->createComment($comment);

// Redirect to comments list page
header('Location: commentList.php?articleId='.$articleId);