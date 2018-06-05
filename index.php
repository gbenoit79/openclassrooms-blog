<?php
// Connect to database
require('includes/dbConnect.php');

// Instantiate post service
require('models/PostService.php');
$postService = new PostService($databaseHandler);

// Handle view data
$viewData = [];
$viewData['title'] = 'Blog de Jean Forteroche';
$viewData['displayCommentsLink'] = true;

// Get last 5 posts
$viewData['postsList'] = $postService->getPostsList(5);

// Display view
require('views/indexView.php');