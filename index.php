<?php
// Connect to database
require('includes/dbConnect.php');

// Instantiate post service
require('models/PostService.php');
$postService = new PostService($databaseHandler);

// Get last 5 posts
$viewData = [];
$viewData['postsList'] = $postService->getPostsList(5);

// Display view
$viewData['displayCommentsLink'] = true;
require('views/indexView.php');