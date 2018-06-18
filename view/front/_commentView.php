<div class="comment">
    <p><strong><?php echo htmlspecialchars($comment->getAuthor()); ?></strong> le <?php echo $comment->getCreationDate(); ?></p>
    <p><?php echo nl2br(htmlspecialchars($comment->getContent())); ?></p>
    <p><a href="index.php?controller=comment&amp;action=report&amp;postId=<?php echo $comment->getPostId(); ?>&amp;commentId=<?php echo $comment->getId(); ?>">Signaler le commentaire</a></p>
</div>