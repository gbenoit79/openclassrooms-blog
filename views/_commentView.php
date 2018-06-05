<p><strong><?php echo htmlspecialchars($comment->getAuthor()); ?></strong> le <?php echo $comment->getCreationDate(); ?></p>
<p><?php echo nl2br(htmlspecialchars($comment->getContent())); ?></p>