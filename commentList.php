<?php
// Get post id
$postId = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;
if ($postId <= 0) {
    throw new \Exception('Error: invalid post id');
}

// Connect to database
require('includes/dbConnect.php');

// Instantiate post service
require('models/PostService.php');
$postService = new PostService($databaseHandler);

// Instantiate comment service
require('models/CommentService.php');
$commentService = new CommentService($databaseHandler);

// Handle view data
$viewData = [];
$viewData['title'] = 'Blog de Jean Forteroche';

// Get post
$viewData['post'] = $postService->getPost($postId);

// Get comments
$viewData['commentsList'] = $commentService->getCommentsList($postId);

// Display view
require('views/commentListView.php');