<?php
// Connect to database
include("includes/dbConnect.php");

// Create comment
$articleId = isset($_POST['articleId']) ? (int) $_POST['articleId'] : 0;
$request = $databaseHandler->prepare('INSERT INTO comments (article_id, author, content, creation_date) VALUES(?, ?, ?, NOW())');
$request->execute(array($articleId, $_POST['author'], $_POST['content']));

// Redirect to comments list page
header('Location: commentList.php?articleId='.$articleId);