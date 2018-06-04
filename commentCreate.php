<?php
// Connect to database
require("includes/dbConnect.php");

// Instantiate comment service
require('models/CommentService.php');
$commentService = new CommentService($databaseHandler);

// Create comment
$postId = isset($_POST['postId']) ? (int) $_POST['postId'] : 0;
$comment = new Comment();
$comment->setPostId($postId);
$comment->setAuthor($_POST['author']);
$comment->setContent($_POST['content']);
$commentService->createComment($comment);

// Redirect to comments list page
header('Location: commentList.php?postId='.$postId);